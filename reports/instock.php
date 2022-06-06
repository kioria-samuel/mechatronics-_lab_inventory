<?php
//check whether the user is logged in
require_once('../powerscripts/logincheck.php');
// Include config file
require_once("../databaseconnection/config.php") ;
//construct query
$sql='SELECT asset_no,asset_name,model,type,created_at ,accounts.username FROM assets LEFT JOIN  accounts ON assets.user_id=accounts.user_id ORDER BY created_at';
//make the query
$result=mysqli_query($con,$sql);
//fetch the results from the query as an array
$assets=mysqli_fetch_all($result,MYSQLI_ASSOC);
//ree thersult o query rom memory
mysqli_free_result($result);
//close connection
mysqli_close($con);

//print_r($assets);



?>
<!DOCTYE html>
<html>

    <?php include('../basic_template/header.php');?>
    <!-- <nav class="navbar  bg-primary"> -->
    <div class="row py-6">
                    <div class="col-lg-12 mx-auto">
                      <div class="card rounded shadow border-0">
                        <div class="card-body p-5 bg-white rounded">
                        <h4 class="text-center font-weight-bold"><u>INSTOCK REPORT</u> </h4>
                        <hr>
                          <div class="table-responsive">
                            <table id="mytablet" style="width:100%" class="table table-striped table-bordered">
                              <thead  class="text-primary font-weight-bold">
                                <tr>
                                  <th>ASSET NO</th>
                                  <th>ASSET NAME</th>
                                  <th>MODEL</th>
                                  <th>TYPE</th>
                                  <th>CREATED_AT</th>
                                  <th>USERNAME</th>
                                 
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($assets as $asset){?>
                                  <tr>
                                 
                                  <td><?php echo htmlspecialchars($asset['asset_no']);?></td>
                                
                                  <td><?php echo htmlspecialchars($asset['asset_name']);?></td>
                                  <td><?php echo htmlspecialchars($asset['model']);?></td>
                                  <td><?php echo htmlspecialchars($asset['type']);?></td>
                                  <td><?php echo htmlspecialchars($asset['created_at']);?></td>
                                  <td><?php echo htmlspecialchars($asset['username']);?></td>
                                 
                                </tr>
                                  <?php
                                  
                                } ?>
                               
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
         
    <?php include('../basic_template/footer.php');?>//include the ooter redundant code or every page
</html>