<?php
if(isset($_GET['email'])){//check if email is available
  echo "email available";
  // Include config file
require_once "../databaseconnection/config.php";
 //update query to set account status to activate 
 if ($stmt = $con->prepare('UPDATE accounts SET activation_status=? WHERE email = ?')) {
  //bind the parameters

  $activationstatus="activate";
  $stmt->bind_param('ss', $activationstatus, $_GET['email']);
  //execute the query
  $stmt->execute();
  $stmt->close();
  $con->close();
  header('Location:../login/index.php');

 }else{
   echo"query error";

 }

}else{
  echo 'not available';
}


?>
