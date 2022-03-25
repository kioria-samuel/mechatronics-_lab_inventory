<?php

// establish a connecion to the database
include ("config.php") ;
//construct query
$sql='SELECT asset_no,asset_name,model,type,created_at  FROM assets ORDER BY created_at';
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

    <?php include('header.php');?>
    <!-- <nav class="navbar  bg-primary"> -->
    <div class="row py-6">
                    <div class="col-lg-12 mx-auto">
                      <div class="card rounded shadow border-0">
                        <div class="card-body p-5 bg-white rounded">
                          <div class="table-responsive">
                            <table id="mytable" style="width:100%" class="table table-striped table-bordered">
                              <thead>
                                <tr>
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
                                  <td><?php echo htmlspecialchars($asset['asset_no']);?></td>
                                  <td><?php echo htmlspecialchars($asset['asset_name']);?></td>
                                  <td><?php echo htmlspecialchars($asset['model']);?></td>
                                  <td><?php echo htmlspecialchars($asset['type']);?></td>
                                  <td><?php echo htmlspecialchars($asset['created_at']);?></td>
                                  <!-- <td>Electrical wiring sytem</td>
                                  <td>85-MT6</td>
                                  <td>2</td>
                                  <td>okey</td>
                                  <td>16/05/2015</td> -->
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
         
    <?php include('footer.php');?>//include the ooter redundant code or every page
</html>