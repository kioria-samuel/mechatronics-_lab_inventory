<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// Include config file
require_once "config.php";
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
<?php include('header.php');?>
<div class="row py-6">
                    <div class="col-lg-12 mx-auto">
                      <div class="card rounded shadow border-0">
                        <div class="card-body p-5 bg-white rounded">
                          <div class="table-responsive">
                            <table id="mytable" style="width:100%" class="table table-striped table-bordered">
                              <thead>
                              <tr>
                              <td>account details</td>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                  <td>username</td>
                                  <td><?=$_SESSION['name']?></td>
                                  </tr>
                                  <tr>
						                <td>Password:</td>
						                <td><?=$password?></td>
					                </tr>
                                 <tr>
						<td>Email:</td>
						<td><?=$email?></td>
					            </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
        
<?php include('footer.php');?>

</html>
