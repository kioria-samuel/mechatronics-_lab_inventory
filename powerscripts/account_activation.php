<?php
//check whether the user is logged in
require_once('logincheck.php');
// Include config file
require("databaseconnection/config.php") ;
//create some variabes
$feedback="";

//check if the data is sent by the post method to the server
if(isset($_POST['save'])){
  
    if($_POST['activationstatus']=="delete"){
        $username=mysqli_real_escape_string($con,$_POST['username']);
         //prepare an update statement where to upate the status column to overdue
      $sql = "DELETE FROM  accounts  WHERE username=? ";
      //make the query and pass connection
      $stmt = mysqli_prepare($con,$sql);
      //bid parameters
       mysqli_stmt_bind_param($stmt, "s", $username);
      if(mysqli_stmt_execute($stmt)){
        $feedback= "account deleted!!! ";
      
    }

    }else{
      $accounttype=mysqli_real_escape_string($con,$_POST['accounttype']);
      $activationstatus=mysqli_real_escape_string($con,$_POST['activationstatus']);
      $username=mysqli_real_escape_string($con,$_POST['username']);
     
      //prepare an update statement where to upate the status column to overdue
      $sql = "UPDATE accounts SET account_type=?,activation_status=?  WHERE username=? ";
      //make the query and pass connection
      $stmt = mysqli_prepare($con,$sql);
      //bid parameters
       mysqli_stmt_bind_param($stmt, "sss",$accounttype,$activationstatus, $username);
      if(mysqli_stmt_execute($stmt)){
        $from    = 'noreply@mechlab9.com';
        $subject = 'Account Activation status';
        $headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
        // Update the activation variable below
        //$activate_link = 'http://localhost:8000/login/activation.php?email=' . $_POST['email'] . '&code=' . $uniqid;
        $message = '<p> Your account has been activated.You can now log in<br>regards<br>Administrator<br>Mechatronics lab inventory :</p>';
        mail($_POST['email'], $subject, $message, $headers);
        //mail($_POST['email'], $subject, $message, $headers);
        $feedback="account activated...";
      
    }
}
}


?>