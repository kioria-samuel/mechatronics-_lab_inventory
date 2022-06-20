<?php
//check whether the user is logged in
require_once('../powerscripts/logincheck.php');
// Include config file
require_once("../databaseconnection/config.php") ;

//initialize error variables
$assetno=$assetname=$model=$status=$type=$query_err=$condition=$quantity='';
$errors=array('assetno'=>'','assetname'=>'','model'=>'','type'=>'','category'=>'','quantity'=>'','add'=>'');
//check whether the data is sent 
if(isset($_POST['scan'])){
  //check asset no
  if (empty($_POST['assetno'])){
    $errors['assetno'] ='asset no required!';
  }else{
    $assetno=$_POST['assetno'];
    if(!preg_match('/^[a-zA-Z0-9]+$/', $assetno ) === 0){//ine tuning my validation
      $errors['assetno'] ='assetno invalid!';
    }
  }
  if(!array_filter($errors)){
    $sql="SELECT asset_no,asset_name,model,type,condition_,quantity FROM assets WHERE asset_no=?";
    $stmt=mysqli_prepare($con, $sql);
    //bind vaiables to the prepared statement
    mysqli_stmt_bind_param($stmt, "s", $assetno);
    $assetno=mysqli_real_escape_string($con,$_POST['assetno']);
    //execute the query
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
       $num=mysqli_stmt_num_rows($stmt);//get the count 
       if(!($num >0)){
        $status="asset_no unique.can proceed with registration of asset";
      }else{
        $stmt->bind_result($assetno,$assetname,$model,$type,$condition,$quantity);
        $stmt->fetch();
        $query_err= 'add quantity to the add quantity field';
      }
  }else{
    $status="solve the errors";
  }

}


//check if the data is sent by the post method to the server
if(isset($_POST['save'])){
  // echo htmlspecialchars($_POST['assetno']) ;//html special charss prevenrs xss any agle brackerts are converted to htnl tags 
  // echo $_POST['assetname'];
  // echo $_POST['model'];
  // echo $_POST['type'];

 if($_POST['action']=='2'){
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
    if(!preg_match('/^[a-zA-Z0-9]+$/',$model ) === 0){
      $errors['model'] ='model invalid!';
    }
  }
   //check type
  if (empty($_POST['type'])){
    $errors['type'] = 'type required!';
    $type=$_POST['type'];
  }else{
    $type=$_POST['type'];
    if(!preg_match('/^[a-zA-Z0-9]+$/', $type) === 0){
      $errors['type'] ='type invalid!';
    }
  }
  //check quantity
  if (empty($_POST['quantity'])){
    $errors['quantity'] = 'quantity required!';
    $quantity=$_POST['quantity'];
  }else{
    $quantity=$_POST['quantity'];
    if(!preg_match('/^[a-zA-Z0-9]+$/', $type) === 0){
      $errors['quantity'] ='=quantity invalid';
    }
  }
  
    if(array_filter($errors)){

    }else{
      $assetno=mysqli_real_escape_string($con,$_POST['assetno']);
      $assetname=mysqli_real_escape_string($con,$_POST['assetname']);
      $model=mysqli_real_escape_string($con,$_POST['model']);
      $type=mysqli_real_escape_string($con,$_POST['type']);
      $condition=mysqli_real_escape_string($con,$_POST['condition']);
      $category=mysqli_real_escape_string($con,$_POST['category']);
      $quantity=mysqli_real_escape_string($con,$_POST['quantity']);
      $id=$_SESSION['id'];
     
        

      //create a variable sql
      $sql="INSERT INTO assets(asset_no,asset_name,model,type,condition_,category,user_id,quantity)VALUES('$assetno','$assetname' , '$model','$type','$condition', '$category',' $id','$quantity' )";
     
      //SAVE TO DB AND CHECK
      $result=mysqli_query($con, $sql);
    if(!$result){
      $query_err= 'query error:duplicate entry';
    }else{
     
      $status="assset saved";
      //header('location:register.php');
  

    }
  
        //ree thersult o query rom memory
//mysqli_free_result($result);
      
    }

  //end of post check validation 
 }else{
  //veriy additional uantity
  // veriies quatity rom the ront end
$addition=mysqli_real_escape_string($con,$_POST['add_quantity']);
$prev_quantity=mysqli_real_escape_string($con,$_POST['quantity']);
//add the addtional amount to the current amount
$updated_quantity=($addition+$prev_quantity);
$assetno=mysqli_real_escape_string($con,$_POST['assetno']);
  //update query
   // Prepare an update statement
   $sql = "UPDATE assets SET quantity=?  WHERE  asset_no=? ";
   if ($stmt = mysqli_prepare($con,$sql)){
    mysqli_stmt_bind_param($stmt,"is",$updated_quantity,$assetno);
    if(mysqli_stmt_execute($stmt)){
    $status= "count updated succesfully";
    // echo "Record Updated:";
  }else{
    $status= "could not update count";
  }
   }
 }

}
//close connection
mysqli_close($con);
?>
<!DOCTYE html>
<html>
    <?php include('../basic_template/header.php');?>
      <!-- start of register form -->
      <section class="container-fluid ">
      <section class="row justify-content-left p-5">
        <section class="col-xs-12 col-sm-10 col-md-8">
          <form class="form-container border-radius:20px" action="batch.php" method="post">
            <h4 class="text-center font-weight-bold"> REGISTER BATCH ASSET </h4>
            <div class="form-group row">
              <label for="inputtype" class="col-sm-2  form-label">Action</label>
              <div class="col-sm-10 ">
                <!-- <input type="text" class="form-control" id="inputtype" placeholder="select"> -->
                <select class="form-control" name="action" value="" id="">
                 <option >none</option>
                  <option value="1">add_to_existing</option>
                  <option value="2">add_new</option>
                </select>
            
              </div>
            </div>
            <div class="form-group row">
              <button type="scan" name="scan" class="btn btn-info col-sm-2  "><i class="fa fa-barcode"></i>|scan</button>
              <div class="col-sm-10">
                <input type="text" class="form-control" name ="assetno" value="<?php echo htmlspecialchars( $assetno) ?>" id="scannedbarcode" placeholder="input_from_scanner">
                <div class="text-light"><?php echo $errors['assetno'];?></div>
                
                <h5 class="text-white font-weight-normal">   <?php echo $status;?>    </h5>
                <h5 class="text-white font-weight-light"> <?php echo  $query_err;?>    </h5>
                
               
              </div>
              
            </div>
            <div class="form-group row">
              <label for="inputasset" class="col-sm-2 col-form-label">Asset</label>
              <div class="col-sm-10">
                <input type="text" class="form-control"  name="assetname" value="<?php echo htmlspecialchars($assetname)   ?>" id="inputasset" placeholder="assset name">
                <div class="text-light"><?php echo $errors['assetname'];?></div>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputmodel" class="col-sm-2 col-form-label">Model</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="model" value="<?php echo htmlspecialchars($model)  ?>" id="inputmodel" placeholder="inputmodel">
                <div class="text-light"><?php echo $errors['model'];?></div>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputmodel" class="col-sm-2 col-form-label">Quantity</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" name="quantity" value="<?php echo htmlspecialchars($quantity)  ?>" id="input quantity" placeholder="input_quantity">
                <div class="text-light"><?php echo $errors['quantity'];?></div>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputtype" class="col-sm-2 col-form-label">Type</label>
              <div class="col-sm-10">
                <!-- <input type="text" class="form-control" id="inputtype" placeholder="select"> -->
                <select class="form-control" name="type" value="<?php echo htmlspecialchars($type)  ?>" id="typeselect">
                <option>none</option>  
                <option>consumable</option>
                  <option>fixed</option>
                </select>
                <div class="text-white"><?php echo $errors['type'];?></div>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputtype" class="col-sm-2  form-label">Condition</label>
              <div class="col-sm-10 ">
                <!-- <input type="text" class="form-control" id="inputtype" placeholder="select"> -->
                <select class="form-control" name="condition" value=">" id="typeselect">
                <option>none</option>  
                <option>okey</option>
                  <option>damaged</option>
                </select>
                
              </div>
            </div>
        

            <div class="form-group row">
              <label for="inputtype" class="col-sm-2  form-label">Category</label>
              <div class="col-sm-10 ">
                <!-- <input type="text" class="form-control" id="inputtype" placeholder="select"> -->
                <select class="form-control" name="category" value="<?php echo htmlspecialchars($category)  ?>" id="typeselect">
                <option>none</option>
                  <option>electronic</option>
                  <option>furniture</option>
                  <option>mechanical</option>
                  
                </select>
              
              </div>
            </div>
            <div class="form-group row">
              <label for="inputmodel" class="col-sm-2 col-form-label">Additional amount</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" name="add_quantity"  placeholder="input_the_amount_to_added" disabled>
                <div class="text-light"><?php echo $errors['add'];?></div>
              </div>
            </div>
            
             
            <div class="form-inline-block">

              <!-- <button type="submit" class="btn btn-primary p-5">save</button>
              <button type="submit" class="btn btn-primary p">delete</button> -->
              <!-- <button type="save" name="save" clalss="btn btn-info col-sm-3  "><i class="fa fa-floppy-o"></i>save</button> -->
              <button type="save" name="save" class="btn btn-info col-sm-2  "><i class="fa fa-floppy-o"></i>save</button>
              <button type="add" class="btn btn-info col-sm-2  "><i class="fa fa-plus"></i>|add</button>
              <!-- <button type="scan" class="btn btn-success col-sm-3  "><i class="fa fa-trash"></i>|delete</button>  -->
            </div>
            
          </form>
    
        </section>

      </section>
   

    </section>

    <?php include('../basic_template/footer.php');?>
</html>
