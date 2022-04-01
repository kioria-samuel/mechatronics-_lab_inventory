<?php
// Include config file
require_once("config.php") ;
$assetno=$status='';
$assetname=$model='';
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
          // $bind=mysqli_stmt_bind_result($stmt,$assetno,$assetname,$model);
          // $result=mysqli_fetch_row($bind);
          // print_r($result);
          $stmt->bind_result($assetno,$assetname);
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
  exit($status);
}
//inserting records to my sql database 
//initialize error variables
$assetno=$assetname=$model=$type='';
$errors=array('assetno'=>'','techname'=>'','departm'=>'','regno'=>'','period'=>'','returnd'=>'');
//check if the data is sent by the post method to the server
if(isset($_POST['save'])){
//startvalidating  user data
  //check asset no
  if (empty($_POST['assetno'])){
    $errors['assetno'] ='asset no required!';
  }else{
    $assetno=$_POST['assetno'];
    if(!preg_match('/^[a-zA-Z0-9]+$/', $assetno ) === 0){//ine tuning my validation
      $errors['assetno'] ='assetno invalid!';
    }
  }
   //check techname
   if (empty($_POST['techname'])){
    $errors['techname'] = 'tech name required!';
  }else{
    $techname=$_POST['techname'];
    if(!preg_match('/^[a-zA-Z0-9]+$/',$assetname ) === 0){
      $errors['techname'] ='techname invalid!';
    }
  }
   //check model
  if (empty($_POST['departm'])){
    $errors['departm'] = 'department required!';
  }else{
    $departm=$_POST['departm'];
    if(!preg_match('/^[a-zA-Z0-9]+$/',$model ) == 0){
      $errors['departm'] ='department invalid!';
    }
  }
   //check type
  if (empty($_POST['regno'])){
    $errors['regno'] = 'regno required!';
  }else{
    $regno=$_POST['regno'];
    if(preg_match('/^[a-zA-Z0-9]+$/', $type) == 0){
      $errors['regno'] ='type invalid!';
    }
  }
    //check period
  if (empty($_POST['period'])){
    $errors['period'] = 'period required!';
  }else{
    $period=$_POST['period'];
    if(preg_match('/^[a-zA-Z0-9]+$/', $type) == 0){
      $errors['period'] ='period invalid!';
    }
     //check period
  if (empty($_POST['returnd'])){
    $errors['returnd'] = 'returnd required!';
  }else{
    $period=$_POST['returnd'];
    if(preg_match('/^[a-zA-Z0-9]+$/', $type) == 0){
      $errors['returnd'] ='return date invalid!';
    }
    if(array_filter($errors)){

    }else{
      $assetno=mysqli_real_escape_string($con,$_POST['assetno']);
      $assetname=mysqli_real_escape_string($con,$_POST['assetname']);
      $model=mysqli_real_escape_string($con,$_POST['model']);
      $type=mysqli_real_escape_string($con,$_POST['type']);
      //create a variable sql
      $sql="INSERT INTO assets(asset_no,asset_name,model,type)VALUES('$assetno','$assetname' , '$model','$type')";
     
      //SAVE TO DB AND CHECK
    if(mysqli_query($con, $sql)){
      header('location:register.php');
    }else{
      echo 'query error:'.mysqli_error($conn);
    }
      
    }

  }
  //end of post check validation
  
}
}


?>
  <!DOCTYE html>
<html>
    <?php include('header.php');?>
      <!-- start of register form -->
      <section class="container-fluid">
      <section class="row justify-content-left p-5">
        <section class="col-12 col-sm-6 col-md-4">
          <form action="borrow.php" method="POST" class="form-container border-radius:20px ">
            <h4 class="text-center font-weight-bold"> BORROW ASSET </h4>
            <div class="form-group row">
              <button type="submit" name="submit" class="btn btn-success col-sm-2  "><i class="fa fa-barcode"></i>|scan</button>
              <div class="col-sm-10">
                <input type="text" name="assetno" class="form-control" value="<?php echo $assetno?>" id="scannedbarcode" placeholder="input_from_scanner">
                <div class="text-danger"><?php echo $status;?></div>
                <div class="text-danger"><?php echo $errors['assetno'];?></div>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputasset" class="col-sm-2 col-form-label">Asset</label>
              <div class="col-sm-10">
                <input type="text"  value="<?php echo htmlspecialchars($assetname)?>" class="form-control" id="inputasset" placeholder="assset name">
               
              </div>
            </div>
            <div class="form-group row">
              <label for="inputtechname" class="col-sm-2 col-form-label">Tech Name</label>
              <div class="col-sm-10">
                <input type="text" name="techname" class="form-control" id="inputtechanme" placeholder="inputtechname">
                <div class="text-danger"><?php echo $errors['techname'];?></div>
              </div>
            </div>
            
            <div class="form-group row">
              <label for="inputtype" class="col-sm-2 col-form-label">Department</label>
              <div class="col-sm-10">
                <!-- <input type="text" class="form-control" id="inputtype" placeholder="select"> -->
                <select class="form-control" id="typeselect" name="departm">
                  <option>mechatronics</option>
                  <option>electrical</option>
                  <option>mechanical</option>
                  <option>civil</option>
                  <!-- <option></option>
                  <option>electrical</option> -->
                </select>
                <div class="text-danger"><?php echo $errors['departm'];?></div>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputRegno" class="col-sm-2 col-form-label">REG NO</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="regno" id="inputRegno" placeholder="inputregno">
                <div class="text-danger"><?php echo $errors['regno'];?></div>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputtechname" class="col-sm-2 col-form-label">Period</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="period" id="inputtechanme" placeholder="return_date">
                <div class="text-danger"><?php echo $errors['period'];?></div>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputtechname" class="col-sm-2 col-form-label">Return date</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="returnd" id="inputtechanme" placeholder="return_date">
                <div class="text-danger"><?php echo $errors['returnd'];?></div>
              </div>
            </div>
            
            <div class="form-inline-block">

             
              <button type="save" name="save" class="btn btn-success col-sm-3  "><i class="fa fa-floppy-o"></i>|save</button>
              <button type="add" class="btn btn-success col-sm-2  "><i class="fa fa-plus"></i>|add</button>
              <button type="scan" class="btn btn-success col-sm-3  "><i class="fa fa-trash"></i>|delete</button>

             
                
            </div>
            
          </form>
    
        </section>

      </section>
   

    </section>
    <?php include('footer.php');?>
</html>
