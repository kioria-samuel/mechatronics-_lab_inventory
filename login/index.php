<?php
session_start();
// Include config file
require_once ("../databaseconnection/config.php");
$username_err = $password_err =$emai_err= $login_err =$errors= "";
// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( isset($_POST['username'], $_POST['password']) ) {
  // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare('SELECT user_id, password,account_type FROM accounts WHERE( username = ? OR email=? )AND activation_status="activate" ')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('ss', $_POST['username'],$_POST['username']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
//check if the username alreadt exists
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password,$account_type);
        $stmt->fetch();
        // Account exists, now we verify the password.
        // Note: remember to use password_hash in your registration file to store the hashed passwords.
        if (password_verify($_POST['password'], $password)) {
            // Verification success! User has logged-in!
            if($account_type=="admin"){
              // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            header('Location:../admin_page.php');
            }else{
            // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            header('Location:../test.php');
            }
        } else {
            // Incorrect password
            $errors= 'Incorrect username and/or password!';
        }
    } else {
        // Incorrect username
        $errors= 'unregistered user';
    }
		$stmt->close();

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
<section class="container-fluid "  >
  
    <!-- row and justify-content-center class is used to place the form in center -->
    <section class="row justify-content-center">
      <section class="col-12 col-sm-6 col-md-4">
        
        
        <form class="form-container"  action="index.php" method="post" autocomplete="off">
        <h4 class="text-center font-weight-bold"> LOGIN </h4>
        <div class="text-danger bg-dark"><?php echo $errors;?></div>
        <!-- <div class="form-group">
       
          <label for="InputEmail1">Email Address</label>
           <input type="email" class="form-control" id="InputEmail1" aria-describeby="emailHelp" placeholder="Enter email">
        </div> -->
        
        <div class="form-group">
          <label for="Inputusername" class="text-white">Username/email</label>
          <input type="text" name="username" class="form-control r" id="username" placeholder="username" required>
        </div>

        <div class="form-group">
          <label for="InputPassword1" class="text-white">Password</label>
          <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn  btn-primary btn-text-white btn-block"><a href="#" class="text-white">Log in</a></button>
        <div class="form-footer text-white">
          <p > Don't have an account? <a href="../login/signup.php">Sign Up</a></p>
          <p> Forgot passsword? <a href="username.php">Reset Password</a></p>
        </div>
        </form>
      </section>
    </section>
  </section>

 
</body>
    
</html>