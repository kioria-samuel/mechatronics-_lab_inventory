<?php

//check whether the user is logged in
require_once('../powerscripts/logincheck.php');
// Include config file
require_once("../databaseconnection/config.php") ;

//construct query
$sql='SELECT  asset_no,tech_name,department,reg_no,borrow_date,period,return_date,condition_,status_  FROM borrow ';
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
                    <div class="col-lg-12 mx-auto">
                      <div class="card rounded shadow border-0">
                        <div class="card-body p-5 bg-white rounded">
                        <h4 class="text-center font-weight-bold"> TRANSCATIONS HISTORY </h4>
                          <div class="table-responsive">
                            <table id="mytable" style="width:100%" class="table table-striped table-bordered">
                              <thead class="text-danger font-weight-bold">
                                <tr>
                                  <th>Asset no</th>
                                  <th>Tech name</th>
                                  <th>Department</th>
                                  <th>Reg No</th>
                                  <th> Borrow date</th>
                                  <th>Period</th>
                                  <th>Return date</th>
                                  <th>Condition</th>
                                  <th>Status</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($borrows as $borrow){?>
                                  <tr>
                                  <td><?php echo htmlspecialchars($borrow['asset_no']);?></td>
                                  <td><?php echo htmlspecialchars($borrow['tech_name']);?></td>
                                  <td><?php echo htmlspecialchars($borrow['department']);?></td>
                                  <td><?php echo htmlspecialchars($borrow['reg_no']);?></td>
                                  <td><?php echo htmlspecialchars($borrow['borrow_date']);?></td>
                                  <td><?php echo htmlspecialchars($borrow['period']);?></td>
                                  <td><?php echo htmlspecialchars($borrow['return_date']);?></td>
                                  <td><?php echo htmlspecialchars($borrow['condition_']);?></td>
                                  <td><?php echo htmlspecialchars($borrow['status_']);?></td>
                                 
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
