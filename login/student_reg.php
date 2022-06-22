<?php
// initialize some values variables 
$email=$sname=$regno=$contact=$dept="";
//initilize errors variables
$err=$email_err=$password_err= $username_err=$cpass_err=$mail_err=$query_err=$user_err="";
$errors=array('email_err'=>'','regno_err'=>'','sname_err'=>'','err'=>'','query_err'=>'','user_err'=>'','contact_err'=>'');
// Include config file
require_once "../databaseconnection/config.php";
// Now we check if the data was submitted, isset() function will check if the data exists.
if (isset($_POST['regno'],$_POST['sname'],$_POST['email'],$_POST['contact'],$_POST['dept'])) {
	// Could not get the data that should have been sent.
//	exit('Please complet the registration form!');

// Make sure the submitted registration values are not empty.
if (empty($_POST['regno']) || empty($_POST['sname']) ||empty($_POST['email']) || empty($_POST['contact']) || empty($_POST['dept'])) {
	// One or more values are empty.
  $errors['err']="please complete the registration form";

}else{
//email validation
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	//exit('Email is not valid!');
  $email=$_POST['email'];
  $errors['email_err']="Email is not valid!";
//username validation
if (!(preg_match('/^[a-zA-Z0-9]+$/', $_POST['sname']) == 0)) {
		//exit('Username is not valid!');
    $sname= $_POST['sname'];
    $errors['sname_err']="name is not valid!";
	}
  //regno validation
if (!(preg_match('/^[a-zA-Z0-9]+$/', $_POST['regno']) == 0)) {
  //exit('Username is not valid!');
  $regno= $_POST['regno'];
  $errors['regno_err']="regno is not valid!";
}
//contact validation
if (!(preg_match('/^[a-zA-Z0-9]+$/', $_POST['sname']) == 0)) {
  //exit('Username is not valid!');
  $contact= $_POST['contact'];
  $errors['contact_err']="contact is not valid!";
}
}


}

//check whether the array errors has got some errors
if(!(array_filter($errors))){
  // We need to check if the account with that username exists.
if ($stmt = $con->prepare('SELECT reg_no FROM student_details WHERE reg_no = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['regno']);
	$stmt->execute();
	$stmt->store_result();
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Username already exists
		$errors['regno_err']="registered student !";
		//echo 'Username exists, please choose another!';
	} else {
		// Insert new account
    $regno=mysqli_real_escape_string($con,$_POST['regno']);
    $sname=mysqli_real_escape_string($con,$_POST['sname']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $contact=mysqli_real_escape_string($con,$_POST['contact']);
    $dept=mysqli_real_escape_string($con,$_POST['dept']);
// Username doesnt exists, insert new account
if ($stmt = $con->prepare('INSERT INTO student_details (reg_no,name,contact,email,department) VALUES (?, ?, ?, ?,?)')) {

  $stmt->bind_param('sssss',$regno,$sname,$contact,$email,$dept);
  
	$stmt->execute();
  $stmt->close();
  $errors['query_err']= 'registration was successful';
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

}else{
  echo "data not sent";
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
        <form class="form-container"method="post" action="student_reg.php"  autocomplete="off" >
        <h4 class="text-warning  bg-dark"> <?php echo  $errors['err'];?> </h4>
        
        <div class="form-group">

        <h4 class="text-center font-weight-bold"> Student registration </h4>
            <label for="regno" class="text-white">Reg no</label>
            <input type="text" name='regno' value="<?php echo htmlspecialchars($regno)?>"class="form-control  " id="username" placeholder="reg_no">
            <h4 class="text-warning  bg-dark"> <?php echo $errors['regno_err'];?> </h4>
            <h4 class="text-warning  bg-dark"> <?php echo  $errors['query_err'];?> </h4>
  
          </div>
          <div class="form-group">
            <label for="sname" class="text-white">Name</label>
            <input type="text" name='sname' value="<?php echo htmlspecialchars($sname)?>"class="form-control  " id="username" placeholder="full names">
            <h4 class="text-warning  bg-dark"> <?php echo $errors['sname_err'];?> </h4>
           
          </div>
        
        <div class="form-group">
          
        
          <label for="InputEmail1" class="text-white">Email Address</label>
           <input type="email" name="email" value="<?php echo htmlspecialchars($email)?>"class="form-control " id="InputEmail1" aria-describeby="emailHelp" placeholder="Enter email">
          
        </div>
        <div class="form-group">
          <label for="contact"class="text-white">contact</label>
          <input type="number" name ='contact' class="form-control" value="<?php echo htmlspecialchars($contact)?>"id="contact" placeholder="contact">
          <h4 class="text-warning  bg-dark "> <?php echo $errors['contact_err'];?> </h4>
        </div>
        <div class="form-group ">
              <label for="department" class="text-white" col-form-label">Department</label>
             
              <select class="form-control" id="typeselect" value="<?php echo htmlspecialchars($period)?>" name="dept">
                  <option>mechatronics</option>
                  <option>electrical</option>
                  <option>mechanical</option>
                  <option>chemical</option>
                  <option>civil</option>
                  <option>other</option>
                </select>
        </div>
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