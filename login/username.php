<?php
// initialize some values variables 
$username="";
//initilize errors variables
$email_err=$query_err=$mail_err="";
$errors=array('query_err'=>'','username_err'=>'','mail_err'=>'','password_err'=>'','cpass_err'=>'');
// Include config file
require_once "../databaseconnection/config.php";
// Now we check if the data was submitted, isset() function will check if the data exists.
if (isset( $_POST['reset'])) {
	// Could not get the data that should have been sent.
//	exit('Please complet the registration form!');

// Make sure the submitted registration values are not empty.
if ( empty($_POST['email'])||empty($_POST['password'])||empty($_POST['cpassword'])) {
	// One or more values are empty.
  $errors['username_err']="please complete the registration form";

}else{
//email validation
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	//exit('Email is not valid!');
  $username=$_POST['email'];
  $errors['username_err']="Email is not valid!";
// //username validation
// if ((preg_match('/^[a-zA-Z0-9]+$/', $_POST['username']) == 0)) {
// 		//exit('Username is not valid!');
//     $username= $_POST['username'];
//     $errors['username_err']="username is not valid!";
// 	}
  //password lenth check
if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
	//exit('Password must be between 5 and 20 characters long!');
  $errors['password_err']='Password must be between 5 and 20 characters long!';
}
//password match check
if(!($_POST['password']==$_POST['cpassword'])){
  //password shound be the same in both cases
  $errors['cpass_err']='Password  did not match!';

}

}

//check whether the array errors has got some errors
if(!(array_filter($errors))){
  // We need to check if the account with that username exists.
if ($stmt = $con->prepare('SELECT email,username FROM accounts WHERE email = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['email']);
	$stmt->execute();
	$stmt->store_result();
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
    $stmt->bind_result($email,$username);//get the email
    $stmt->fetch();//etch the result
//insert new password where username =the said username
if ($stmt = $con->prepare('UPDATE accounts SET password=?,activation_status=? WHERE email = ?')) {
  //bind the parameters
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $activationstatus="dormant";
  $stmt->bind_param('sss',$password, $activationstatus, $_POST['email']);
  //execute the query,
  $stmt->execute();
  //send the users an activation link
  $from    = 'noreply@mechlab9.com';
  $subject = 'PASSWORD RESET';
  $headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
  // Update the activation variable below
  $activate_link = 'http://localhost:8000/login/reset_password.php?email='.$email;
  $message = '<p>click this link to reset your password <br></p>'.$activate_link.'<p>regards <br>Administrator<br>Mechatronics lab inventory</p>';
  //$message = '<p>click this link to reset your password <br>.<a href=$activate_link></a>$activate_link.regards <br>Administrator<br>Mechatronics lab inventory</p>';
  $email=$_POST['email'];
  if( mail($email, $subject, $message, $headers)){
    $errors['mail_err']="check your mail for reset status";
  
  }else{
    $errors['mail_err']="mail not sent";
  
  }


}
    
  //$errors['mail_err']= 'check your mail to reset your password';
		
	} else {
    // no username was ound
		$errors['username_err']="incorrect username";
		//echo 'Username exists, please choose another!';

	}
	$stmt->close();
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	$errors['query_err']= 'Could not prepare statement!';
 
}
}



$con->close();

}
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
    <body>
        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!-- Login form creation starts-->
<section class="container-fluid" >
    <!-- row and justify-content-center class is used to place the form in center -->
    <section class="row justify-content-center">
      <section class="col-12 col-sm-6 col-md-4">
        <form class="form-container" method="post" action="username.php">
        <div class="form-group">
            <label for="username " class="text-white">Email</label>
            <input type="text" name='email' value="<?php echo htmlspecialchars($username)?>"class="form-control  " id="username" placeholder="username">
            <h4 class="text-danger  bg-dark"> <?php echo $errors['username_err'];?> </h4>
            <h4 class="text-warning  bg-dark"> <?php echo $errors['mail_err'];?> </h4>
          </div>
        <!-- <div class="form-group">
          <h4 class="text-center font-weight-bold"> Reset password </h4>
          <label for="InputEmail1">Enter code</label>
           <input type="text" class="form-control" id="EnterCode" aria-describeby="emailHelp" placeholder="Enter Code">
        </div> -->
        <div class="form-group">
          <label for="InputPassword1" class="text-white">Password</label>
          <input type="password" name="password" class="form-control" id="InputPassword1" placeholder="Password">
          <h4 class="text-warning  bg-dark"> <?php echo $errors['password_err'];?> </h4>
     
        </div>
        <div class="form-group">
          <label for="Confirm Password" class="text-white">Confirm Password</label>
          <input type="password" name="cpassword" class="form-control" id="InputPassword1" placeholder="Confirm Password">
          <h4 class="text-warning  bg-dark"> <?php echo $errors['cpass_err'];?> </h4>
        </div>
        <button type="submit" name="reset"class="btn btn-primary btn-block">Reset Password</button>
        <button type="submit" class="btn  btn-primary btn-text-white btn-block"><a href="index.php" class="text-white">Log in</a></button>

        <div class="form-footer">
          <!-- <p> Don't have an account? <a href="#">Sign Up</a></p> -->
          
        </div>
        </form>
      </section>
    </section>
  </section>
<!-- Login form creation ends -->

 
</body>
    
</html>