<?php


function cleared_by_checker($cleared_by){
    // Include config file
require("../databaseconnection/config.php") ;
//construct query
$sql='SELECT  username FROM accounts where user_id=?';
$stmt = mysqli_prepare($con, $sql);
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "i",$cleared_by );
mysqli_stmt_execute($stmt);

$stmt->bind_result($username);
 $stmt->fetch();

 mysqli_close($con);
return $username;
//print_r($assets);
}


?>