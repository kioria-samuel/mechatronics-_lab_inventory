<?php
//include connection to the database

// creating count function assets table
function count_items_borrow($input){
    require("databaseconnection/config.php") ;
     
   //construct query
   $sql='SELECT  id FROM assets where type=?';
   //$stmt=mysqli_prepare($con,$sql);
   $stmt=mysqli_prepare($con,$sql);
   //binding values to the prepared statement
   mysqli_stmt_bind_param($stmt,"s",$xx);
   $xx=$input;
   //execute the statement
   mysqli_stmt_execute($stmt);
   //store result
   mysqli_stmt_store_result($stmt);
   //getting the count 
   $count=mysqli_stmt_num_rows($stmt);
   // Close statement
   mysqli_stmt_close($stmt);
   return $count;
   }
 
  
  // creating count function
  function count_items($input){
    require("databaseconnection/config.php") ;
    if($input=="okey"||"damaged"){
      //construct query
  $sql='SELECT  id FROM borrow where condition_=?';
  $stmt=mysqli_prepare($con,$sql);
  //binding values to the prepared statement
  mysqli_stmt_bind_param($stmt,"s",$xx);
  $xx=$input;
  //execute the statement
  mysqli_stmt_execute($stmt);
  //store result
  mysqli_stmt_store_result($stmt);
  //getting the count 
  $count=mysqli_stmt_num_rows($stmt);
  // Close statement
  mysqli_stmt_close($stmt);
  return $count;

    }elseif($input=="borrowed"||$input=="Uncleared"||$input=="cleared"){
      
   //construct query
   $sql='SELECT  id FROM borrow where status_=?';
   $stmt=mysqli_prepare($con,$sql);
   //binding values to the prepared statement
   mysqli_stmt_bind_param($stmt,"s",$xx);
   $xx=$input;
   //execute the statement
   mysqli_stmt_execute($stmt);
   //store result
   mysqli_stmt_store_result($stmt);
   //getting the count 
   $count=mysqli_stmt_num_rows($stmt);
   // Close statement
   mysqli_stmt_close($stmt);
   return $count;
    }
  }
?>