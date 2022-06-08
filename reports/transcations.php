<?php

//check whether the user is logged in
require_once('../powerscripts/logincheck.php');
// Include config file
require_once("../databaseconnection/config.php") ;

//construct query
$sql='SELECT  department,reg_no,borrow_date,period,return_date,condition_,status_,assets.asset_name,assets.condition_,assets.asset_no ,accounts.username,accounts.username FROM borrow,assets,accounts WHERE borrow.asset_no=assets.asset_no AND (borrow.user_id=accounts.user_id OR borrow.cleared_by=accounts.user_id) ';
//make the query
$result=mysqli_query($con,$sql);
//fetch the results from the query as an array
$borrows=mysqli_fetch_all($result,MYSQLI_ASSOC);
//ree thersult o query rom memory
mysqli_free_result($result);
//close connection
mysqli_close($con);

//print_r($assets);



?>
<!DOCTYE html>
<html>
    <?php include('../basic_template/header.php');?>
    <div class="row py-6">
                    <div class="col-sm-12 col-md-12 col-lg-12  mx-auto">
                      <div class="card rounded shadow border-0">
                        <div class="card-body p-5 bg-white rounded">
                        <h4 class="text-center font-weight-bold"><u>TRANSCATIONS HISTORY REPORT</u> </h4>
                        <hr>
                          <div class="table-responsive">
                            <table id="mytablet" style="width:100%" class="table table-striped table-bordered">
                              <thead class="text-primary font-weight-bold">
                                <tr>
                                  <th>ASSET NO</th>
                                  <th>ASSET NAME</th>
                                  <th>ISSUED BY</th>
                                  <th>DEPARTMENT </th>
                                  <th>REG NO</th>
                                  <th> BORROW DATE</th>
                                  <th>PERIOD</th>
                                  <th> RETURN DATE</th>
                                  <th>CONDITION</th>
                                  <th>STATUS</th>
                                  <th>CLEARED_BY</th>

                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($borrows as $borrow){?>
                                  <tr>
                                  <td><?php echo htmlspecialchars($borrow['asset_no']);?></td>
                                  <td><?php echo htmlspecialchars($borrow['asset_name']);?></td>
                                  <td><?php echo htmlspecialchars($borrow['username']);?></td>
                                  <td><?php echo htmlspecialchars($borrow['department']);?></td>
                                  <td><?php echo htmlspecialchars($borrow['reg_no']);?></td>
                                  <td><?php echo htmlspecialchars($borrow['borrow_date']);?></td>
                                  <td><?php echo htmlspecialchars($borrow['period']);?></td>
                                  <td><?php echo htmlspecialchars($borrow['return_date']);?></td>
                                  <td><?php echo htmlspecialchars($borrow['condition_']);?></td>
                                  <td><?php echo htmlspecialchars($borrow['status_']);?></td>
                                  <td><?php echo htmlspecialchars($borrow['username']);?></td>
                                 
                                </tr>
                                <?php
                                }
                                ?>             
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              

    <?php include('../basic_template/footer.php');?>
</html>
