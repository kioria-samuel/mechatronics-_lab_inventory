<?php
// Include config file
require_once("config.php") ;
$assetno=$status='';
if(isset($_POST['submit'])){
// echo 'there is something';
 // Prepare a select statement
 $sql = "SELECT asset_no,asset_name,model FROM assets WHERE asset_no =?";
        
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
            
            $status="component registered";
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
// //construct query
// $sql='SELECT  asset_no,asset_name,model FROM assets WHERE  asset_no=?';
// // Bind variables to the prepared statement as parameters
// $sql=mysqli_stmt_bind_param($sql, "i", $assetno);
//    //set the parameter
//    $assetno=$_POST['assetno'];         
// //make the query
// $result=mysqli_query($con,$sql);
// $rowcount=mysqli_num_rows($result);
// if($rowcount>0){
// //fetch the results from the query as an array
// $assets=mysqli_fetch_all($result,MYSQLI_ASSOC);
// print_r($assets);
// }else{
//   echo 'no such record boy component unregistered';
// }
//ree thersult o query rom memory
// mysqli_free_result($result);
// //close connection
// mysqli_close($con);
}else{
  echo 'data not sent ';
}



?>
<!DOCTYE html>
<html>
    <?php include('header.php');?> 
    <!-- start of register form -->
    <section class="container-fluid">
      <section class="row justify-content-left p-5">
        <section class="col-12 col-sm-6 col-md-4">
          <form   class="form-container border-radius:20px " action="identify.php" method="post">
            <h4 class="text-center font-weight-bold"> IDENTIFY ASSET </h4>
            <div class="form-group row">
              <button type="submit" name="submit" class="btn btn-success col-sm-2  "><i class="fa fa-barcode"></i>|scan</button>
              <div class="col-sm-10">
                <input type="text" class="form-control" name ="assetno" id="scannedbarcode" placeholder="input_from_scanner">
                <div class="text-danger"><?php echo $status;?></div>
              </div>
            </div>
            <!-- <div class="form-group row">
              <label for="inputasset" class="col-sm-2 col-form-label">Asset</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputasset" placeholder="assset name">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputmodel" class="col-sm-2 col-form-label">Model</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputmodel" placeholder="inputmodel">
              </div>
            </div> -->
            
            <div class="form-inline-block">

              <!-- <button type="save" class="btn btn-success col-sm-3  "><i class="fa fa-floppy-o"></i>|save</button> -->
              <button type="verify"  id="types" class="btn btn-success col-sm-2"><a href="#"></a><i class="fa fa-plus"></i>|add</button>
              <!-- <button type="scan" class="btn btn-success col-sm-3  "><i class="fa fa-trash"></i>|delete</button> -->
  
            </div>
          </form>
        </section>
      </section>
    </section>
    <?php include('footer.php');?>
</html>