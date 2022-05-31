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

//deaulterss count unction
   function count_items_defaulters(){
    require("databaseconnection/config.php") ;
     //construct query
$sql='SELECT  asset_no,condition_,status_  FROM borrow where status_="Uncleared" OR status_="overdue"';
//make the query
$result=mysqli_query($con,$sql);
//counting of records with damaged items
$damaged_count=mysqli_num_rows($result);
//fetch the results from the query as an array
$borrows=mysqli_fetch_all($result,MYSQLI_ASSOC);

//ree thersult o query rom memory
mysqli_free_result($result);
//close connection
mysqli_close($con);
return $damaged_count;
   }
   //borrowed function
   function count_items_borrowed(){
    require("databaseconnection/config.php") ;
     //construct query
$sql='SELECT  asset_no,condition_,status_  FROM borrow where status_="borrowed" OR status_="overdue" ';
//make the query
$result=mysqli_query($con,$sql);
//counting of records with damaged items
$damaged_count=mysqli_num_rows($result);
//fetch the results from the query as an array
$borrows=mysqli_fetch_all($result,MYSQLI_ASSOC);

//ree thersult o query rom memory
mysqli_free_result($result);
//close connection
mysqli_close($con);
return $damaged_count;
   }
   //damaged unction
   function count_items_damaged(){
    require("databaseconnection/config.php") ;
     //construct query
$sql='SELECT  asset_no,condition_,status_  FROM borrow where condition_="damaged"';
//make the query
$result=mysqli_query($con,$sql);
//counting of records with damaged items
$damaged_count=mysqli_num_rows($result);
//fetch the results from the query as an array
$borrows=mysqli_fetch_all($result,MYSQLI_ASSOC);

//ree thersult o query rom memory
mysqli_free_result($result);
//close connection
mysqli_close($con);
return $damaged_count;
   }
//get the name o assets rom assets table
function getassetname($input){
   require("databaseconnection/config.php") ;
    
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

   //unction thtat checks whether the items are overdue
//    function overdue_checker(){
//     require("databaseconnection/config.php") ;
//      //construct query
// $sql='SELECT  asset_no,condition_,status_  FROM borrow where condition_="damaged"';
// //make the query
// $result=mysqli_query($con,$sql);
// //counting of records with damaged items
// $damaged_count=mysqli_num_rows($result);
// //fetch the results from the query as an array
// $borrows=mysqli_fetch_all($result,MYSQLI_ASSOC);

// //ree thersult o query rom memory
// mysqli_free_result($result);
// //close connection
// mysqli_close($con);
// return $damaged_count;
//    }
  
  // // creating count function
  // function count_items(){
  //   require("databaseconnection/config.php") ;
  //   if($input=="okey"||"damaged"){
  //     //construct query
  // $sql='SELECT  id FROM borrow where condition_=?';
  // $stmt=mysqli_prepare($con,$sql);
  // //binding values to the prepared statement
  // mysqli_stmt_bind_param($stmt,"s",$xx);
  // $xx=$input;
  // //execute the statement
  // mysqli_stmt_execute($stmt);
  // //store result
  // mysqli_stmt_store_result($stmt);
  // //getting the count 
  // $count=mysqli_stmt_num_rows($stmt);
  // // Close statement
  // mysqli_stmt_close($stmt);
  // return $count;

  //   }elseif($input=="borrowed"||$input=="Uncleared"||$input=="cleared"){
      
  //  //construct query
  //  $sql='SELECT  id FROM borrow where status_=?';
  //  $stmt=mysqli_prepare($con,$sql);
  //  //binding values to the prepared statement
  //  mysqli_stmt_bind_param($stmt,"s",$xx);
  //  $xx=$input;
  //  //execute the statement
  //  mysqli_stmt_execute($stmt);
  //  //store result
  //  mysqli_stmt_store_result($stmt);
  //  //getting the count 
  //  $count=mysqli_stmt_num_rows($stmt);
  //  // Close statement
  //  mysqli_stmt_close($stmt);
  //  return $count;
  //   }
  // }
?>