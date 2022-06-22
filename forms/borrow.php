<?php
//check whether the user is logged in
require('../powerscripts/logincheck.php');
// Include config file
require_once("../databaseconnection/config.php") ;
require("../powerscripts/date_calculator.php");
$assetno=$status=$num=$statu=$name=$regno=$email=$contact=$department='';
$assetname=$model='';

//initialize error variables
$assetno=$assetname=$model=$type=$techname=$departm=$regno=$period=$returnd=$email=$contact=$gname=$pname="";
$errors=array('assetno'=>'','techname'=>'','departm'=>'','regno'=>'','period'=>'','returnd'=>'','contact'=>'','email'=>'','pname'=>'','gname'=>'');
if(isset($_POST['submit'])){
// echo 'there is something';
//check whether the component is issued to another person
 // Prepare a select statement
 $sql = "SELECT assets.asset_no,assets.asset_name,borrow.status_ FROM assets,borrow WHERE borrow.asset_no=? AND (borrow.status_='overdue' OR borrow.status_='borrowed' OR borrow.status_='Uncleared' OR assets.condition_='Uncleared')";
        
 if($stmt = mysqli_prepare($con, $sql)){
     // Bind variables to the prepared statement as parameters
     mysqli_stmt_bind_param($stmt, "i", $assetno);
     
     // Set parameters
     $assetno = trim($_POST["assetno"]);
     
     // Attempt to execute the prepared statement
     if(mysqli_stmt_execute($stmt)){
         /* store result */
         mysqli_stmt_store_result($stmt);
         $num=mysqli_stmt_num_rows($stmt);//get the count 
         if($num >0){
          // $bind=mysqli_stmt_bind_result($stmt,$assetno,$assetname,$model);
          // $result=mysqli_fetch_row($bind);
          // print_r($result);

           //  echo "component not registred";
           $status="cannot issue componet-status:";
           $stmt->bind_result($assetno,$assetname,$statu);
          $stmt->fetch();
         
           
         } else{
         
          // print_r($assetno);
          // print_r($assetname);
          // print_r($model);
            
            $status="component available for issuing";

           
         }
     } else{
         echo "Oops! Something went wrong. Please try again later.";
     }

     // Close statement
     mysqli_stmt_close($stmt);
 }

}elseif(isset($_POST['scan'])){
 // Prepare a select statement
 $sql = "SELECT reg_no,name,contact,email,department FROM student_details WHERE reg_no=?";
        
 if($stmt = mysqli_prepare($con, $sql)){
     // Bind variables to the prepared statement as parameters
     mysqli_stmt_bind_param($stmt, "s", $regno);
     
     // Set parameters
     $regno = trim($_POST["regno"]);
     
     // Attempt to execute the prepared statement
     if(mysqli_stmt_execute($stmt)){
         /* store result */
         mysqli_stmt_store_result($stmt);
         $num=mysqli_stmt_num_rows($stmt);//get the count 
         if($num >0){
          // $bind=mysqli_stmt_bind_result($stmt,$assetno,$assetname,$model);
          // $result=mysqli_fetch_row($bind);
          // print_r($result);

           //  echo "component not registred";
           $status="registered student";
           $stmt->bind_result($regno,$name,$email,$contact,$department);
          $stmt->fetch();
         
           
         } else{
         
          // print_r($assetno);
          // print_r($assetname);
          // print_r($model);
            
            $status="uneregistered student";

           
         }
     } else{
         echo "Oops! Something went wrong. Please try again later.";
     }

     // Close statement
     mysqli_stmt_close($stmt);


}
}
else{
  $status="please scan";
  //exit($status);
  //inserting records to my sql database 

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
  
 
   //check type
  if (empty($_POST['regno'])){
    $errors['regno'] = 'regno required!';
  }else{
    $regno=$_POST['regno'];
    if(!preg_match('/^[a-zA-Z0-9]+$/', $regno) ==0){
      $errors['regno'] ='type invalid!';
    }
  }

    //check period
  if (empty($_POST['period'])){
    $errors['period'] = 'period required!';
  }else{
    $period=$_POST['period'];
    if(!preg_match('/^[a-zA-Z0-9]+$/', $period) === 0){
      $errors['period'] ='period invalid!';
    }
  }
 
    if(array_filter($errors)){

    }else{
      // check whether the optional fields are empty

      if(!(empty($_POST['gname'])&&empty($_POST['pname']))){
        // verify the optional data
        $gname=$_POST['gname'];
        if(!preg_match('/^[a-zA-Z0-9]+$/', $gname) === 0){
          $errors['gname'] ='group name is invalid!';
        }
        //verify thr project name
        $pname=$_POST['pname'];
        if(!preg_match('/^[a-zA-Z0-9]+$/', $pname) === 0){
          $errors['pname'] ='project name invalid!';
        }
        //check for the finaltime i there are any errors
        if(!array_filter($errors)){
          //insert the values
          $assetno=mysqli_real_escape_string($con,$_POST['assetno']);
      $userid=mysqli_real_escape_string($con,$_POST['techname']);
      // $departm=mysqli_real_escape_string($con,$_POST['departm']);
      $regno=mysqli_real_escape_string($con,$_POST['regno']);
      // $contact=mysqli_real_escape_string($con,$_POST['contact']);
      // $email=mysqli_real_escape_string($con,$_POST['email']);
      $period=mysqli_real_escape_string($con,$_POST['period']);
      $groupname=mysqli_real_escape_string($con,$_POST['gname']);
      $pname=mysqli_real_escape_string($con,$_POST['pname']);

     // $returnd=mysqli_real_escape_string($con,$_POST['returnd']);
      $status="borrowed";
      $returnd=return_date($period);//call the date function to calcuate return date
      
      
      //create a variable sql
      $sql="INSERT INTO borrow(asset_no,user_id,reg_no,period,return_date,status_,group_name,project_name)VALUES('$assetno','$userid', '$departm','$regno','$period','$returnd','$status','$contact','$email','$gname','$pname')";
     
      //SAVE TO DB AND CHECK
    if(mysqli_query($con, $sql)){
      $status='record saved';
      //header('location:borrow.php');
    }else{
      $status='query error:'.mysqli_error($conn);
    }


        }else{
          //display some errors
          $status='solve the optinal data errors ';

        }



      }else{
        // insert values to the that contais something
        $assetno=mysqli_real_escape_string($con,$_POST['assetno']);
      $userid=$_SESSION['id'];
      $regno=mysqli_real_escape_string($con,$_POST['regno']);

      $period=mysqli_real_escape_string($con,$_POST['period']);
     

     // $returnd=mysqli_real_escape_string($con,$_POST['returnd']);
      $status="borrowed";
      $returnd=return_date($period);//call the date function to calcuate return date
      
      
      //create a variable sql
      $sql="INSERT INTO borrow(asset_no,user_id,reg_no,period,return_date,status_)VALUES('$assetno','$userid','$regno','$period','$returnd','$status')";
     
      //SAVE TO DB AND CHECK
    if(mysqli_query($con,$sql)){
      $status='record saved';
      //header('location:borrow.php');
    }else{
      $status='query error:'.mysqli_error($conn);
    }
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
      <section class="container-fluid">
      <section class="row justify-content-left p-5">
        <section class="col-xs-12 col-sm-10 col-md-8">
          <form action="borrow.php" method="POST" class="form-container border-radius:20px ">
            <h4 class="text-center font-weight-bold"> BORROW ASSET </h4>
            <div class="form-group row">
              <button type="submit" name="submit" class="btn btn-info col-xs-5 col-sm-2  "><i class="fa fa-barcode"></i>|scan</button>
              <div class="col-sm-10">
                <input type="text" name="assetno" class="form-control" value="<?php echo $assetno?>" id="scannedbarcode" placeholder="input_from_scanner">
                <div class="  text-white"><?php echo $status.$statu;?></div>
                <div class="   text-white"><?php echo $errors['assetno'];?></div>
                <!-- <div class="text-danger"><?php echo $num;?></div> -->
              </div>
            </div>
            <div class="form-group row">
              <label for="inputasset" class="col-sm-2 col-form-label">Asset</label>
              <div class="col-sm-10">
                <input type="text"  value="<?php echo htmlspecialchars($assetname)?>" class="form-control" id="inputasset" placeholder="assset name">
                
              </div>
            </div>
            
            <div class="form-group row">
            <button type="submit" name="scan" class="btn btn-info col-xs-5 col-sm-2  "><i class="fa-brands fa-searchengin"></i>veriy</button>
              <!-- <label for="inputRegno" class="col-sm-2 col-form-label">REG NO</label> -->
              <div class="col-sm-10">
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($regno)?>" name="regno" id="inputRegno" placeholder="inputregno">
                <div class="text-white"><?php echo $errors['regno'];?></div>
              </div>
            </div>
          
             
            <div class="form-group row">
              <label for="inputtechname" class="col-sm-2 col-form-label">Period</label>
              <div class="col-sm-10">
              <select class="form-control" id="typeselect" value="<?php echo htmlspecialchars($period)?>" name="period">
                  <option>short_term</option>
                  <option>long_term</option>
                  <option>Project</option>
                </select>
                <div class="text-white"><?php echo $errors['period'];?></div>
              </div>
              
            </div>
            
            
            
            <div class="form-inline-block">

             
              <button type="save" name="save" class="btn btn-info col-sm-3  "><i class="fa fa-floppy-o"></i>|save</button>
              <button type="add" class="btn btn-info col-sm-2  "><i class="fa fa-plus"></i>|add</button>
              <button type="scan" class="btn btn-info col-sm-3  "><i class="fa fa-trash"></i>|delete</button>

             
                
            </div>
            
          </form>
         
        </section>
        <!-- student details -->
       <section col-xs-12 col-sm-12 col-md-12>
            <div class="table-responsive bg-white">
          <table id="m" style="width:100%" class="table table-striped table-bordered table-white">
               <thead class="text-primary font-weight-bold">
                <tr>
     
                    <th>Reg No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Department</th>
                     <th>Group name</th>
                    <th>Purpose</th>
                    <th>P_Name</th>
                    <!-- <th> Date</th>
                    <th>Contact</th> -->
               </tr>
             </thead>
              <tbody>
              <td><?php echo htmlspecialchars($regno);?></td>
              <td><?php echo htmlspecialchars($name);?></td>
              <td><?php echo htmlspecialchars($email);?></td>
              <td><?php echo htmlspecialchars($contact);?></td>
              <td><?php echo htmlspecialchars($department);?></td>
              
              
              </tbody>
        </table>

        </div> 

            </section>
       
      </section>
       
    </section>
    <?php include('../basic_template/footer.php');?>
</html>
