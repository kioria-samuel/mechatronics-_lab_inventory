<?php
//check whether the user is logged in
require_once('../powerscripts/logincheck.php');
// Include config file
require_once("../databaseconnection/config.php") ;
//construct query
$sql='SELECT id, asset_no,asset_name,model,type,created_at  FROM assets ORDER BY created_at';
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
                          <div class="table-responsive">
                            <table id="mytable" style="width:100%" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th>id</th>
                                  <th>Asset no</th>
                                  <th>Asset</th>
                                  <th>Model</th>
                                  <th>type</th>
                                  <th>created_at</th>
                                 
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($assets as $asset){?>
                                  <tr>
                                  <td><?php echo htmlspecialchars($asset['id']);?></td>
                                  <td><?php echo htmlspecialchars($asset['asset_no']);?></td>
                                  <td><?php echo htmlspecialchars($asset['asset_name']);?></td>
                                  <td><?php echo htmlspecialchars($asset['model']);?></td>
                                  <td><?php echo htmlspecialchars($asset['type']);?></td>
                                  <td><?php echo htmlspecialchars($asset['created_at']);?></td>
                                 
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