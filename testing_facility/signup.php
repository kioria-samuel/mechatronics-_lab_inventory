<?php
//initilize errors variables
$errors="";
// Include config file
require_once "../databaseconnection/config.php";
// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['username'], $_POST['password'],$_POST['confirmpassword'], $_POST['email'])) {
	// Could not get the data that should have been sent.
	exit('Please complet the registration form!');
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['username']) || empty($_POST['password']) ||empty($_POST['confirmpassword']) || empty($_POST['email'])) {
	// One or more values are empty.
	exit('Please complete the registration form');

}
//email validation
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	//exit('Email is not valid!');
	//$emai_err="";
//username validation
if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['username']) == 0) {
		exit('Username is not valid!');
	}
}
//password lenth check
if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
	exit('Password must be between 5 and 20 characters long!');
}
// We need to check if the account with that username exists.
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Username already exists
		$username_err="Username exists, please choose another!";
		//echo 'Username exists, please choose another!';
	} else {
		// Insert new account
// Username doesnt exists, insert new account
if ($stmt = $con->prepare('INSERT INTO accounts (username, password, email, activation_status) VALUES (?, ?, ?, ?)')) {
	// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $activation_status="dormant";
 // $uniqid = uniqid();//generates a unique id or use in our activation code 
  $stmt->bind_param('ssss', $_POST['username'], $password, $_POST['email'],  $activation_status);
  
	$stmt->execute();
 
  $from    = 'mechlab9@gmail.com';
  $subject = 'Account Activation status';
  $headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
  // Update the activation variable below
  //$activate_link = 'http://localhost:8000/login/activation.php?email=' . $_POST['email'] . '&code=' . $uniqid;
  $message = '<p>Kindly wait for your account to be activated we will notify you when done.<br>regards<br>Mechatronics lab :</p>';
  mail($_POST['email'], $subject, $message, $headers);
  if( mail($_POST['email'], $subject, $message, $headers)){
    $errors="mail sent";
  }else{
    $errors="mail not sent";
  }
  $errors= 'check your mail for activation status';
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	$errors= 'Could not prepare statement!';
}

	}
	$stmt->close();
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	$errors= 'Could not prepare statement!';
}
$con->close();
?>
