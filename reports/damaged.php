<?php
//check whether the user is logged in
require_once('../powerscripts/logincheck.php');
// Include config file
require_once("../databaseconnection/config.php") ;

//construct query
$sql='SELECT  asset_no,condition_,status_  FROM borrow where condition_="damaged"';
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
                    <div class="col-lg-12  mx-auto">
                      <div class="card rounded bg-white shadow border-0">
                        <div class="card-body p-5 bg-white rounded">
                        <h4 class="text-center font-weight-bold"> DAMAGED </h4>
                          <div class="table-responsive">
                            <table id="mytable" style="width:100%" class="table table-striped table-bordered">
                              <thead class="text-danger font-weight-bold">
                                <tr>
                                  <th>ASSET NO</th>
                                  <th>CONDITION</th>
                                  <th>STATUS</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($borrows as $borrow){?>
                                  <tr>
                                  <td><?php echo htmlspecialchars($borrow['asset_no']);?></td>
                                 
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
