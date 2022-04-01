<?php
// Include config file
// require_once("config.php") ;
$assetno=$assetname=$status='';
if(isset($_POST['submit'])){
// echo 'there is something';
 // Prepare a select statement
 $sql = "SELECT asset_no,asset_name FROM assets WHERE asset_no =?";
        
 if($stmt = mysqli_prepare($con, $sql)){
     // Bind variables to the prepared statement as parameters
     mysqli_stmt_bind_param($stmt, "i", $assetno);
     
     // Set parameters
     $assetno = trim($_POST["assetno"]);
     
     // Attempt to execute the prepared statement
     if(mysqli_stmt_execute($stmt)){
         /* store result */
         mysqli_stmt_store_result($stmt);
         
         if(mysqli_stmt_num_rows($stmt)  >0){
         
          $stmt->bind_result($assetno,$assetname);
          $stmt->fetch();
      
            $status="component available";
           // $assets=mysqli_fetch_all($stmt,MYSQLI_ASSOC);
         } else{
            //  echo "component not registred";
             $status="unregistered assset";
         }
     } else{
         echo "Oops! Something went wrong. Please try again later.";
     }

     // Close statement
     mysqli_stmt_close($stmt);
 }

}else{
  $status="please scan";
}



?>