<?php

//check whether the user is logged in
require_once('../powerscripts/logincheck.php');

require('../databaseconnection/config.php');
require('../powerscripts/defaulters.php');

?>
<!DOCTYE html>
<html>
    <?php include('../basic_template/header.php');?>
    <div class="row py-6">
                    <div class="col-lg-12  mx-auto">
                      <div class="card rounded bg-white shadow border-0">
                        <div class="card-body p-5 bg-white rounded">
                        <h4 class="text-center font-weight-bold"> <u>DEFAULTERS REPORT</u> </h4>
                        <hr>

                          <div class="table-responsive">
                            <table id="mytable" style="width:100%" class="table table-striped table-bordered">
                              <thead class="text-primary font-weight-bold">
                                <tr>
                                  <th>ASSET NO</th>
                                  <th>REG NO</th>
                                  <th>CONDITION</th>
                                  <th>STATUS</th>
                                  
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($borrows as $borrow){?>
                                  <tr>
                                  <td><?php echo htmlspecialchars($borrow['asset_no']);?></td>
                                 
                                  <td><?php echo htmlspecialchars($borrow['reg_no']);?></td>
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
