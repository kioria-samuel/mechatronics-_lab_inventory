<?php

//intializing the count variables
$damaged_count=$borrowed_count=$defaulters_count=$instock_cons_count=$instock_fixed_count=$defaulters=$borrowed='';
//include the connection file 
require('databaseconnection/config.php');
//check whether the user is logged in
require_once('powerscripts/logincheck.php');
//include thec ocunt unction
require_once('powerscripts/count_check.php');
//include the defaulters query report
require('powerscripts/defaulters.php');
//include the dormant accounts  query report
require('powerscripts/accounts.php');
//include the overdue_checker query
require('powerscripts/overdue_checker.php');
//include the account activation ile
require('powerscripts/account_activation.php');

$damaged_count=count_items_damaged();
 $instock_cons_count=count_items_borrow("consumable");
 $instock_fixed_count=count_items_borrow("fixed");
 $borrowed=count_items_borrowed();
 $defaulters=count_items_defaulters();
?>
<!DOCTYE html>
<html>
    <?php include('basic_template/admin_header.php');?>
    <!-- begin  o dashboard -->
 <main role="main" class="col-md-9 ml-sm-auto col-lg-12 px-4">
     <!--end   o dashboard -->
 <h3 class="text-light">DORMANT ACCOUNTS</h3>
 <hr>

 <div class="table-responsive bg-white">
  
 <!-- <button class="btn btn-success" onclick="printTable();"><span class="glyphicon glyphicon-print"></span> Print</button> -->
                            <table id="#" style="width:100%" class="table table-striped  table-white">
                              <thead class="text-primary font-weight-bold">
                                <tr>
                                  <th>USERNAME</th>
                                  <th>EMAIL</th>
                                  <th>ACCOUNT TYPE</th>
                                  <th>ACTIVATION STATUS</th>
                                  <th>ACTION</th>
                                 
                                </tr>
                              </thead>
                              <tbody>
                                
                              <?php foreach($accounts as $account){?>
                                  <tr>
                                  <form class="form-container " action="admin_page.php" method="post">
                                   
                                  <td> <input type="text" class="form-control"  name="username" value="<?php echo htmlspecialchars($account['username']);?>" ></td>
                                  <td> <input type="text" class="form-control"  name="email" value="<?php echo htmlspecialchars($account['email']);?>" ></td>
                                  <td> <select class="form-control" name="accounttype"  id="typeselect">
                                        <option>none</option>
                                         <option>admin</option>
                                        <option>regular</option>
                                     </select>
                                    </td>
                                  <td><select class="form-control" name="activationstatus"  id="typeselect">
                                     <option>activate</option>
                                     <option>delete</option>
                                 </select>
                                </td>
                                <td>
                                <button type="submit" name="save" class="btn btn-primary text-light  col-sm-8  "><i class="fa fa-plus"></i>|SAVE</button>
                                </td>
                                 
                                  
                              </form>
                                </tr>
                                <?php
                                }
                                ?>             
                               
                               
                               
                              </tbody>
                            </table>

 </div> 
 <!-- start of defaulters report -->
 <h3 class="text-light">DEFAULTERS</h3>
 <hr>
 <div class="text-dark"><?php  echo "Feedback:"."!!!!". $overdue_status?></div>
   <div class="text-dark text-center"><?php  echo "Maling status:"."!!!!". $mailing_status?></div>
 <div class="table-responsive bg-white">
  
 <button class="btn btn-success" onclick="printTable();"><span class="glyphicon glyphicon-print"></span> Print</button>
                            <table id="mytablet" style="width:100%" class="table table-striped  table-white">
                              <thead class="text-primary font-weight-bold">
                                <tr>
                                  <th>Asset No</th>
                                  <th>Reg No</th>
                                  <th>Condition</th>
                                  <th>Status</th>
                                  <th>Contact</th>
                                  <th>Email</th>
                                  <th>Asset</th>
                                  <!-- <th> Date</th>
                                  <th>Contact</th> -->
                                </tr>
                              </thead>
                              <tbody>
                                
                              <?php foreach($borrows as $borrow){?>
                                  <tr>
                                   <?php $asse=getassetname($borrow['asset_no']);?>
                                  <td><?php echo htmlspecialchars($borrow['asset_no']);?></td>
                                 
                                  <td><?php echo htmlspecialchars($borrow['reg_no']);?></td>
                                  <td><?php echo htmlspecialchars($borrow['condition_']);?></td>
                                  <td><?php echo htmlspecialchars($borrow['status_']);?></td>
                                  <td><?php echo htmlspecialchars($borrow['contact']);?></td>
                                  <td><?php echo htmlspecialchars($borrow['email']);?></td>
                                  <td><?php echo htmlspecialchars($asse);?></td>
                                </tr>
                                <?php
                                }
                                ?>             
                               
                               
                               
                              </tbody>
                            </table>

 </div> 
  <!-- end of defaulters report -->
<!-- start o cards  -->
<h3 class="text-white ">STATISTICS</h3>
<hr>
<!-- start o cards -->
<div class="row">
    <div class="col-sm-2">
      <div class="card">
        <div class="card-body bg-white">
          <h5 class="card-title text-warning">Damaged</h5>
          <hr>
          <h6 class="card-text">Total:<?php echo $damaged_count ?></h6>
          <!-- <p class="card-text">Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.</p> -->
          <a href="../reports/damaged.php" class="btn btn-primary">view in detail</a>
        </div>
      </div>
    </div>
    <!-- borrowed card -->
    <div class="col-sm-2">
      <div class="card">
        <div class="card-body bg-white">
          <h5 class="card-title text-warning">Borrowed</h5>
          <hr>
          <h6 class="card-text">Total:<?php echo $borrowed ?></h6>
          <!-- <p class="card-text">Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.</p> -->
          <a href="../reports/transcations.php" class="btn btn-primary">view in detail</a>
        </div>
      </div>
    </div>
    <!-- end o borrowed card -->
    <!-- start o Defaulters card -->
    <div class="col-sm-2">
      <div class="card">
        <div class="card-body bg-white">
          <h5 class="card-title text-warning">Defaulters</h5>
          <hr>
          <h6 class="card-text">Total:<?php echo $defaulters ?></h6>
          <!-- <p class="card-text">Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.</p> -->
          <a href="../reports/defaulters.php" class="btn btn-primary">view in detail</a>
        </div>
      </div>
    </div>
    <!-- end  o Defaulters card -->
    <!-- start o instock card -->
    <div class="col-sm-2">
      <div class="card">
        <div class="card-body bg-white">
          <h5 class="card-title text-warning">Consumables</h5>
          <hr>
          <h6 class="card-text">Total:<?php echo $instock_cons_count ?></h6>
          <!-- <p class="card-text">Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.</p> -->
          <a href="../reports/instock.php" class="btn btn-primary">view in detail</a>
        </div>
      </div>
    </div>
    <!-- start o ixed count_items -->
    <div class="col-sm-2">
      <div class="card">
        <div class="card-body bg-white">
          <h5 class="card-title text-warning">Fixed</h5>
          <hr>
          <h6 class="card-text">Total:<?php echo $instock_fixed_count ?></h6>
          <!-- <p class="card-text">Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.</p> -->
          <a href="../reports/instock.php" class="btn btn-primary">view in detail</a>
        </div>
      </div>
    </div>
    
  </div>
  <h3 class="text-white">Quick links</h3>
  <hr class="">
  <div class="row">
    <div class="col-sm-2">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title text-warning">Reports</h5>
          <hr>
          <!-- <p class="card-text">Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.</p> -->
          <h6 class="card-text"><a href="../reports/damaged.php">Damaged </h6>
          <h6 class="card-text"><a href="../reports/overdue.php">Overdue </h6>
          <h6 class="card-text"><a href="../reports/transcations.php">Transactions</h6>
          <h6 class="card-text"><a href="../reports/instock.php">Instock</h6>
    
          <!-- <a href="#" class="btn btn-primary">Print</a> -->
        </div>
      </div>
    </div>
    <div class="col-sm-2">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title text-warning">Forms</h5>
          <hr>
          <h6 class="card-text"><a href="../forms/borrow.php"> Borrow</h6>
          <h6 class="card-text"><a href="../forms/identify.php">Identify </h6>
          <h6 class="card-text"><a href="../forms/register.php">Register</h6>
          <h6 class="card-text"><a href="../forms/return.php">Return</h6>
          <!-- <a href="#" class="btn btn-primary">Print</a> -->
        </div>
      </div>
    </div>
  </div>
  <h3>Statistics</h3>
<hr>

  <!-- reports section -->
<!-- start o cards -->
 </main>
        
    <?php include('basic_template/footer.php');?>
</html>
