<?php
//check whether the user is logged in
require_once('../powerscripts/logincheck.php');
// Include config file
require_once("../databaseconnection/config.php") ;
$assetno=$status='';
$assetno=$assetname=$model='';
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
          // $bind=mysqli_stmt_bind_result($stmt,$assetno,$assetname,$model);
          // $result=mysqli_fetch_row($bind);
          // print_r($result);
          $stmt->bind_result($assetno,$assetname,$model);
          $stmt->fetch();
          // print_r($assetno);
          // print_r($assetname);
          // print_r($model);
            
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

}else{
  $status="please scan";
}



?>
<!DOCTYE html>
<html>
    <?php include('../basic_template/header.php');?> 
    <!-- start of register form -->
    <div class=" justify-content-center align-items-center container">
      <section class="row  p-5">
        <section class="col-xs-12 col-sm-10 col-md-8  ">
          <form   class="form-container  border-radius:20px " action="identify.php" method="post">
            <h4 class="text-center font-weight-bold"> IDENTIFY ASSET </h4>
            <div class="form-group row">
              <button type="submit" name="submit" class="btn btn-info col-sm-2  "><i class="fa fa-barcode"></i>|scan</button>
              <div class="col-sm-10">
                <input type="text" class="form-control"  value="<?php echo $assetno?>" name ="assetno" id="scannedbarcode" placeholder="input_from_scanner">
                <div class="text-white"><?php echo $status;?></div>
              </div>
            </div>
             <div class="form-group row">
              <label for="inputasset" class="col-sm-2 col-form-label">Asset</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="<?php echo $assetname?>" id="inputasset" placeholder="assset name">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputmodel" class="col-sm-2 col-form-label">Model</label>
              <div class="col-sm-10">
                <input type="text" value="<?php echo $model?>" class="form-control" id="inputmodel" placeholder="inputmodel">
              </div>
            </div> 
            
            <div class="form-inline-block">

              <!-- <button type="save" class="btn btn-success col-sm-3  "><i class="fa fa-floppy-o"></i>|save</button> -->
              <button type="verify"  id="types" class="btn btn-info col-sm-2"><a href="identify.php"></a><i class="fa fa-plus"></i>|reset</button>
              <!-- <button type="scan" class="btn btn-success col-sm-3  "><i class="fa fa-trash"></i>|delete</button> -->
  
            </div>
          </form>
        </section>
      </section>
</div>
    <?php include('../basic_template/footer.php');?>
</html>