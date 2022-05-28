<?php
// email details
// $to = 'samkioria@gmail.com';
// $subject = 'overdue lab component';
// $message = 'honouring return dates increases your chances  of boorrowing components from the Lab?'; 
// $from = 'mechlab9@gmail.com';
// echo"niko nje ya mail";
// // Sending email
// if(mail($to, $subject, $message)){
// echo 'Your mail has been sent successfully.';
// } else{
// echo 'Unable to send email. Please try again.';
// }
// $receiver = "samkioria@gmail.com";
// $subject = "overdue lab component";
// $body = "honouring return dates increases your chances  of boorrowing components from the Lab kindly return the following items";
// $sender = "From:samkioria@gmail.com";
// if(mail($receiver, $subject, $body, $sender)){
//     echo "Email sent successfully to $receiver";
// }else{
//     echo "Sorry, failed while sending mail!";
// }

// $to = 'samkioria@gmail.com';
// $subject = 'overdue asset';
// $from = 'mechlab9@gmail.com';
 
// // To send HTML mail, the Content-type header must be set
// $headers  = 'MIME-Version: 1.0' . "\r\n";
// $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// // Create email headers
// $headers .= 'From: '.$from."\r\n".
//     'Reply-To: '.$from."\r\n" .
//     'X-Mailer: PHP/' . phpversion();
 
// // Compose a simple HTML email message
// $message = '<html><body>';
// $message .= '<h1 style="color:#f40;">Hi Jane!</h1>';
// $message .= '<p style="color:#080;font-size:18px;">Will you marry me?</p>';
// $message .= '</body></html>';
 
// // Sending email
// if(mail($to, $subject, $message, $headers)){
//     echo 'Your mail has been sent successfully.';
// } else{
//     echo 'Unable to send email. Please try again.';
// }
//get the name o assets rom assets table
function getassetname($input){
    require("../databaseconnection/config.php") ;
     
   //construct query
   $sql='SELECT  asset_name FROM assets where asset_no=?';
   //$stmt=mysqli_prepare($con,$sql);
   $stmt=mysqli_prepare($con,$sql);
   //binding values to the prepared statement
   mysqli_stmt_bind_param($stmt,"s",$xx);
   $xx=$input;
   //execute the statement
   mysqli_stmt_execute($stmt);
  
   //binding the rwsult
   mysqli_stmt_bind_result($stmt,$coun);//takes two variable result o query execurion and the variables to hold the new parameters
  // mysqli_stmt_num_rows($stmt);
   mysqli_stmt_fetch($stmt);
    //store result
   // mysqli_stmt_store_result($stmt);
   //fetch result as an associative array
   mysqli_stmt_close($stmt);
 
   // Close statement
   return $coun;
   }
   $asset=getassetname(7897);
   echo $asset;


?>