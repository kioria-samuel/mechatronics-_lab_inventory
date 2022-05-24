<?php
//check whether the user is logged in
require_once('../powerscripts/logincheck.php');
// Include config file
require_once("../databaseconnection/config.php") ;

//initialize error variables
$assetno=$assetname=$model=$status=$type='';
$errors=array('assetno'=>'','assetname'=>'','model'=>'','type'=>'',);
//check if the data is sent by the post method to the server
if(isset($_POST['save'])){
  // echo htmlspecialchars($_POST['assetno']) ;//html special charss prevenrs xss any agle brackerts are converted to htnl tags 
  // echo $_POST['assetname'];
  // echo $_POST['model'];
  // echo $_POST['type'];
 
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
   //check assetname
   if (empty($_POST['assetname'])){
    $errors['assetname'] = 'asset name required!';
  }else{
    $assetname=$_POST['assetname'];
    if(!preg_match('/^[a-zA-Z0-9]+$/',$assetname ) === 0){
      $errors['assetname'] ='assetname invalid!';
    }
  }
   //check model
  if (empty($_POST['model'])){
    $errors['model'] = 'model required!';
  }else{
    $model=$_POST['model'];
    if(!preg_match('/^[a-zA-Z0-9]+$/',$model ) == 0){
      $errors['model'] ='model invalid!';
    }
  }
   //check type
  if (empty($_POST['type'])){
    $errors['type'] = 'type required!';
  }else{
    $type=$_POST['type'];
    if(preg_match('/^[a-zA-Z0-9]+$/', $type) == 0){
      $errors['type'] ='type invalid!';
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
      $status="assset saved";
      //header('location:register.php');
    }else{
      echo 'query error:'.mysqli_error($conn);
    }
      
    }
  }
  //end of post check validation 
}
?>
<!DOCTYE html>
<html>
    <?php include('../basic_template/header.php');?>
      <!-- start of register form -->
      <section class="container-fluid ">
      <section class="row justify-content-left p-5">
        <section class="col-12 col-sm-6 col-md-4">
          <form class="form-container border-radius:20px" action="register.php" method="post">
            <h4 class="text-center font-weight-bold"> REGISTER ASSET </h4>
            <div class="form-group row">
              <button type="scan" class="btn btn-success col-sm-2  "><i class="fa fa-barcode"></i>|scan</button>
              <div class="col-sm-10">
                <input type="text" class="form-control" name ="assetno" value="<?php echo htmlspecialchars( $assetno) ?>" id="scannedbarcode" placeholder="input_from_scanner">
                <div class="text-danger"><?php echo $errors['assetno'];?></div>
                <div class="text-danger"><?php echo $status;?></div>
              </div>
              
            </div>
            <div class="form-group row">
              <label for="inputasset" class="col-sm-2 col-form-label">Asset</label>
              <div class="col-sm-10">
                <input type="text" class="form-control"  name="assetname" value="<?php echo htmlspecialchars($assetname)   ?>" id="inputasset" placeholder="assset name">
                <div class="text-danger"><?php echo $errors['assetname'];?></div>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputmodel" class="col-sm-2 col-form-label">Model</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="model" value="<?php echo htmlspecialchars($model)  ?>" id="inputmodel" placeholder="inputmodel">
                <div class="text-danger"><?php echo $errors['model'];?></div>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputtype" class="col-sm-2 col-form-label">Type</label>
              <div class="col-sm-10">
                <!-- <input type="text" class="form-control" id="inputtype" placeholder="select"> -->
                <select class="form-control" name="type" value="<?php echo htmlspecialchars($type)  ?>" id="typeselect">
                  <option>consumable</option>
                  <option>fixed</option>
                </select>
                <div class="text-danger"><?php echo $errors['type'];?></div>
              </div>
            </div>
             
            <div class="form-inline-block">

              <!-- <button type="submit" class="btn btn-primary p-5">save</button>
              <button type="submit" class="btn btn-primary p">delete</button> -->
              <button type="save" name="save" clalss="btn btn-success col-sm-3  "><i class="fa fa-floppy-o"></i>|save</button>
              <button type="add" class="btn btn-success col-sm-2  "><i class="fa fa-plus"></i>|add</button>
              <button type="scan" class="btn btn-success col-sm-3  "><i class="fa fa-trash"></i>|delete</button> 
            </div>
            
          </form>
    
        </section>

      </section>
   

    </section>

    <?php include('../basic_template/footer.php');?>
</html>
