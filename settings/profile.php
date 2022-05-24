<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// Include config file
require_once "../databaseconnection/config.php";
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT password, email FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html>
<?php include('../basic_template/header.php');?>
<div class="row  ">
                    <div class="col-sm-5">
                      <div class="card rounded shadow border-0">
                        <div class="card-body  bg-dark rounded">
                        <div class="card bg-dark">
              
          <h5 class="card-title text-success text-justify-centre">ACCOUNT DETAILS</h5>
          <!-- <hr> -->
          <h6 class="card-text text-primary">USERNAME:<?=$_SESSION['name']?></h6>
          <h6 class="card-text text-primary">EMAIL   :<?=$email?></h6>
          <a href="../reports/defaulters.php" class="btn btn-primary">Edit account details</a>
        </div>
                        </div>
                      </div>
                    </div>
                  
                
          
            <div class="col-sm-7">
            <div class="card rounded shadow border-0">
            <div class="card-body  bg-dark rounded">
            <form action="borrow.php" method="POST" class="form-container border-radius:20px ">
            <h5 class="text-center font-weight-bold text-success"> EDIT ACCOUNT DETAILS </h5>
            <br>
            
            <div class="form-group row">
              <label for="inputasset" class="col-sm-2 col-form-label text-primary">Username</label>
              <div class="col-sm-5">
                <input type="text"  value="" class="form-control" id="inputasset" placeholder="username">
               
              </div>
            </div>
            <div class="form-group row">
              <label for="inputasset" class="col-sm-2 col-form-label text-primary">Email</label>
              <div class="col-sm-5">
                <input type="text"  value="" class="form-control" id="inputasset" placeholder="email">
               
              </div>
            </div>
            <div class="form-group row">
              <label for="inputasset" class="col-sm-2 col-form-label text-primary">Pasword</label>
              <div class="col-sm-5">
                <input type="text"  value="" class="form-control" id="inputasset" placeholder="password">
               
              </div>
            </div>
            <button type="save" name="save" class="btn btn-success col-sm-3  "><i class="fa fa-floppy-o"></i>|save</button>
            </form>

             </div>
             </div>
            </div>
          </div>      
        <!-- stat o creator details -->
        <div class="row">
        <div class="col-sm-12">
        <div class="card rounded shadow border-0">
          <div class="card-body  bg-dark rounded">
            <h5 class="card-text text-centre font-weight-bold text-success ">PROJECT CONTRIBUTORS</h5>
            <div class="row">
            <!-- proile photo -->
            <div class="col-sm-5">
            <div class="card rounded shadow border-0">
          <div class="card-body text-centre bg-dark rounded">
          <img src="kioria_.jpeg" alt="profile image"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3 text-primary">Samuel Kioria</h5>
            <p class="text-primary mb-1">Web Developer,Mechatronics student</p>
            <p class="text-primary mb-4">Dekut,Nyeri,Kenya</p>
            <div class="d-flex justify-content-center mb-2">
              <!-- <button type="button" class="btn btn-primary">Follow</button> -->
              <button type="button" class="btn btn-outline-primary ms-1">Contact</button>
            </div>
          </div>
          </div>
            </div>
            <!-- developer background -->
            <div class="col-sm-5">
            <div class="card rounded shadow border-0">
          <div class="card-body text-centre  bg-dark rounded">
          <img src="nyaga.jfif" alt="profile image"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3 text-primary">Peterson Nyaga</h5>
            <p class="text-primary mb-1">Chief Technologist,Mechatronics Lab</p>
            <p class="text-primary mb-4">Dekut,Nyeri,Kenya</p>
            <div class="d-flex justify-content-center mb-2">
              <!-- <button type="button" class="btn btn-primary">Follow</button> -->
              <button type="button" class="btn btn-outline-primary ms-1">Contact</button>
            </div>
          </div>
          </div>
            </div>
            </div>
          </div>
         </div>
        </div>
        </div>
<?php include('../basic_template/footer.php');?>

</html>
