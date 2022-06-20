<?php
// initialize some values variables 
$email=$username="";
//initilize errors variables
$err=$email_err=$password_err= $username_err=$cpass_err=$mail_err=$query_err=$user_err="";
$errors=array('email_err'=>'','password_err'=>'','username_err'=>'','err'=>'','cpass_err'=>'','mail_err'=>'','query_err'=>'','user_err'=>'');
// Include config file
require_once "../databaseconnection/config.php";
// Now we check if the data was submitted, isset() function will check if the data exists.
if (isset($_POST['username'], $_POST['password'],$_POST['confirmpassword'], $_POST['email'])) {
	// Could not get the data that should have been sent.
//	exit('Please complet the registration form!');

// Make sure the submitted registration values are not empty.
if (empty($_POST['username']) || empty($_POST['password']) ||empty($_POST['confirmpassword']) || empty($_POST['email'])) {
	// One or more values are empty.
  $errors['err']="please complete the registration form";

}else{
//email validation
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	//exit('Email is not valid!');
  $email=$_POST['email'];
  $errors['email_err']="Email is not valid!";
//username validation
if (!(preg_match('/^[a-zA-Z0-9]+$/', $_POST['username']) == 0)) {
		//exit('Username is not valid!');
    $username= $_POST['username'];
    $errors['username_err']="username is not valid!";
	}
}
//password lenth check
if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
	//exit('Password must be between 5 and 20 characters long!');
  $errors['password_err']='Password must be between 5 and 20 characters long!';
}
//password match check
if(!($_POST['password']==$_POST['confirmpassword'])){
  //password shound be the same in both cases
  $errors['cpass_err']='Password  did not match!';

}
}

//check whether the array errors has got some errors
if(!(array_filter($errors))){
  // We need to check if the account with that username exists.
if ($stmt = $con->prepare('SELECT user_id, password FROM accounts WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Username already exists
		$errors['user_err']="Username exists, please choose another!";
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
  $stmt->close();
 
  $from    = 'noreply@mechlab9.com';
  $subject = 'Account Activation status';
  $headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
  // Update the activation variable below
  //$activate_link = 'http://localhost:8000/login/activation.php?email=' . $_POST['email'] . '&code=' . $uniqid;
  $message = '<p>Kindly wait for your account to be activated we will notify you when done.<br>regards<br>Adminstrator<br>Mechatronics lab inventory:</p>';
  mail($_POST['email'], $subject, $message, $headers);
  if( mail($_POST['email'], $subject, $message, $headers)){
    $errors['mail_err']="mail sent";
  
  }else{
    $errors['mail_err']="mail not sent";
  
  }
  $errors['mail_err']= 'check your mail for activation status';

} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	$errors['query_err']= 'Could not prepare statement!';
 
}

	}
	
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	$errors['query_err']= 'Could not prepare statement!';
 
}
}



$con->close();

}

?>


<html>
    <head>
 <!-- Required meta tags -->
 <meta charset="utf-8"> <!-- support many laguages,accomodate pages and forms -->

 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="..//css/style.css">
 
    </head>
    <body >
        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!-- Login form creation starts-->
<section class="container-fluid">
    <!-- row and justify-content-center class is used to place the form in center -->
    <section class="row justify-content-center">
      <section class="col-12 col-sm-6 col-md-4">
        <form class="form-container" action="signup.php" method="post" autocomplete="off" >
            
        <div class="form-group">
        <h4 class="text-center font-weight-bold"> Student registration </h4>
            <label for="username" class="text-white">Reg no</label>
            <input type="text" name='username' value="<?php echo htmlspecialchars($username)?>"class="form-control  " id="username" placeholder="username">
            <h4 class="text-warning  bg-dark"> <?php echo $errors['username_err'];?> </h4>
            <h4 class="text-warning  bg-dark"> <?php echo $errors['user_err'];?> </h4>
          </div>
          <div class="form-group">
            <label for="username" class="text-white">Name</label>
            <input type="text" name='username' value="<?php echo htmlspecialchars($username)?>"class="form-control  " id="username" placeholder="username">
            <h4 class="text-warning  bg-dark"> <?php echo $errors['username_err'];?> </h4>
            <h4 class="text-warning  bg-dark"> <?php echo $errors['user_err'];?> </h4>
          </div>
        
        <div class="form-group">
          
          <h5 class="text-warning bg-dark "> <?php echo $errors['err'];?> </h4>
          <label for="InputEmail1" class="text-white">Email Address</label>
           <input type="email" name="email" value="<?php echo htmlspecialchars($email)?>"class="form-control " id="InputEmail1" aria-describeby="emailHelp" placeholder="Enter email">
           <h4 class="text-warning bg-dark "> <?php echo $errors['mail_err'];?> </h4>
        </div>
        <div class="form-group">
          <label for="InputPassword1"class="text-white">contact</label>
          <input type="number" name ='contact' class="form-control" id="InputPassword1" placeholder="Password">
          <h4 class="text-warning  bg-dark "> <?php echo $errors['password_err'];?> </h4>
        </div>
       
       
          <!-- <div class="form-group">
            <label for="username">Email</label>
            <input type="email" name='email'class="form-control" id="email" placeholder="email">
          </div> -->
        <!-- <div class="form-group">
          <label for="InputPassword1"class="text-white">Password</label>
          <input type="password" name ='password' class="form-control" id="InputPassword1" placeholder="Password">
          <h4 class="text-warning  bg-dark "> <?php// echo $errors['password_err'];?> </h4>
        </div>
        <div class="form-group">
            <label for="InputConfirmpassword" class="text-white">Confirm Password</label>
            <input type="password" name='confirmpassword' class="form-control" id="confirmpassword" placeholder=" Confirm Password">
            <h4 class="text-warning bg-dark"> <?php //echo $errors['cpass_err'];?> </h4>
          </div> -->
        <button type="submit" value="submit" class="btn btn-primary btn-block">Submit</button>
        <div class="form-footer text-white">
          <p>Already have an account? <a href="index.php">Log in</a></p>
          
        </div>
        </form>
      </section>
    </section>
  </section>
 
</body>
    
</html>