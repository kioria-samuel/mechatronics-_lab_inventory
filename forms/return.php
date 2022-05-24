<?php
//check whether the user is logged in
require_once('../powerscripts/logincheck.php');
// Include config file
require_once("../databaseconnection/config.php") ;
$status=$condition=$assetno=$techname=$departm=$regno=$borrowd=$period=$returnd='';
//grab the borrowed record 
if(isset($_POST['submit'])){
  // echo 'there is something';
   // Prepare a select statement where status is null
   $sql = "SELECT asset_no,tech_name,department,reg_no,borrow_date,period,return_date FROM borrow WHERE asset_no =? AND status_='borrowed'";
          
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
            $stmt->bind_result($assetno,$techname,$departm,$regno,$borrowd,$period,$returnd);
            $stmt->fetch();
            // print_r($assetno);
            // print_r($assetname);
            // print_r($model);
              
              $status="component registered";
             // $assets=mysqli_fetch_all($stmt,MYSQLI_ASSOC);
           } else{
              //  echo "component not registred";
               $status="cleared asset";
           }
       } else{
           echo "Oops! Something went wrong. Please try again later.";
       }
  
       // Close statement
       mysqli_stmt_close($stmt);
   }
  
  }else{

    $status= "please scan";
    //check if the data is sent by the post method to the server
if(isset($_POST['clear'])){
  $condition='';
  $status=$_POST['status'];
  $assetno=$_POST['assetno'];
  $condition=$_POST['cond'];
   // Prepare an update statement
 $sql = "UPDATE borrow SET condition_=?,status_=?  WHERE asset_no=? AND status_='borrowed'";
 if ($stmt = mysqli_prepare($con,$sql)){
  mysqli_stmt_bind_param($stmt, "ssi", $condition, $status, $assetno);
  mysqli_stmt_execute($stmt);
  $status= "student cleared";
  // echo "Record Updated:";
 }
}
}

?>
<!DOCTYE html>
<html>
    <?php include('../basic_template/header.php');?>
    <!-- start of register form -->
    <section class="container-fluid">
      <section class="row justify-content-left p-5">
        <section class="col-12 col-sm-6 col-md-4">
          <form  class="form-container border-radius:20px " action="return.php" method="POST">
            <h4 class="text-center font-weight-bold"> RETURN  ASSET </h4>
            <div class="form-group row">
              <button type="scan" name="submit" class="btn btn-success col-sm-2  "><i class="fa fa-barcode"></i>|scan</button>
              <div class="col-sm-10">
                <input type="text" class="form-control" name ="assetno" value="<?php echo htmlspecialchars($assetno)?>" id="scannedbarcode" placeholder="input_from_scanner">
                <div class="text-danger"><?php echo $status;?></div>
              </div>
            </div>
            
            <div class="form-group row">
              <label for="inputtechname" class="col-sm-2 col-form-label">Tech Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($techname)?>" id="inputtechanme" placeholder="inputtechname">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputtechname" class="col-sm-2 col-form-label">Department</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($departm)?>" id="inputtechanme" placeholder="inputtechname">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputdate" class="col-sm-2 col-form-label">Borrow Date</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($borrowd)?>" id="date" placeholder="borrow date">
              </div>
            </div>
         
            <div class="form-group row">
              <label for="inputRegno" class="col-sm-2 col-form-label">REG NO</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($regno)?>" id="inputRegno" placeholder="inputregno">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputtechname" class="col-sm-2 col-form-label">Period</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($period)?>" id="inputtechanme" placeholder="quantity">
              </div>
            </div>
           
            
            <div class="form-group row">
              <label for="inputtechname" class="col-sm-2 col-form-label">Return date</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($returnd)?>" id="inputtechanme" placeholder="return_date">
              </div>
            </div>



            <div class="form-group row">
              <label for="inputtype" class="col-sm-2 col-form-label">Condition</label>
              <div class="col-sm-10">
                <select class="form-control" name="cond" id="typeselect">
                  <option>none</option>
                  <option>okey</option>
                  <option>damaged</option>  
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputtype" class="col-sm-2 col-form-label">Status</label>
              <div class="col-sm-10">
                <!-- <input type="text" class="form-control" id="inputtype" placeholder="select"> -->
                <select class="form-control" name="status" id="typeselect">
                  <option>none</option>
                  <option>cleared</option>
                  <option>Uncleared</option>
                  
                </select>
              </div>
            </div>
            
            <div class="form-inline-block">

             
              <button type="clear" name ="clear" class="btn btn-success col-sm-3  "><i class="fa fa-floppy-o"></i>|clear</button>
              <button type="add" class="btn btn-success col-sm-2  "><i class="fa fa-plus"></i>|add</button>
              <!-- <button type="scan" class="btn btn-success col-sm-3  "><i class="fa fa-trash"></i>|delete</button> -->

             
                
            </div>
            
          </form>
    
        </section>

      </section>
   

    </section>

    <?php include('../basic_template/footer.php');?>
</html>
