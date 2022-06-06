<?php

//check whether the user is logged in
require_once('../powerscripts/logincheck.php');
//include thec ocunt unction
//require_once('../powerscripts/count_check.php');
// Include config file
require("../databaseconnection/config.php") ;

//construct query
$sql='SELECT  assets.asset_no,assets.asset_name,assets.condition_,status_  FROM borrow,assets where assets.condition_="damaged" AND assets.asset_no=borrow.asset_no ';
//make the query
$result=mysqli_query($con,$sql);
//counting of records with damaged items
$damaged_count=mysqli_num_rows($result);
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
                    <div class="col-lg-12  mx-auto">
                      <div class="card rounded bg-white shadow border-0">
                        <div class="card-body p-5 bg-white rounded">
                        <h4 class="text-center font-weight-bold"><u>DAMAGED REPORT</u>  </h4>
                        <hr>

                          <div class="table-responsive">
                            <table id="mytablet" style="width:100%" class="table table-striped table-bordered">
                              <thead class="text-primary font-weight-bold">
                                <tr>
                                  <th>ASSET NO</th>
                                  <th>ASSET NAME</th>
                                  <th>CONDITION</th>
                                  <th>STATUS</th>
                                  
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($borrows as $borrow){?>
                                  <tr>
                                  <td><?php echo htmlspecialchars($borrow['asset_no']);?></td>
                                  <td><?php echo htmlspecialchars($borrow['asset_name']);?></td>
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
