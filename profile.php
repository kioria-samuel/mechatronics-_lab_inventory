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

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>mechatronics lab inventory</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style4.css">

    <!-- Font Awesome JS -->
    <!-- <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script> -->
    <script src="https://kit.fontawesome.com/cf3b94705e.js" crossorigin="anonymous"></script>
     <!-- jquery cdn link -->
     <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
   
     

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header d-inline-block">
                
                <h3><i class="fas fa-pallet fa-50x"></i>Mechatronics </h3>
                <strong>MLI</strong>
            </div>

            <ul class="list-unstyled components">
                
                <li>
                    <a href="#">
                        <i class="fas fa-home"></i>
                        Home
                    </a>
                <li>
                    <a href="register.html">
                        <i class="fas fa-feather-alt"></i>
                        Register
                    </a>
                    <a href="#borrowmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <!-- <i class="fas fa-copy"></i> -->
                        <i class="fa-solid fa-hand-holding-dollar"></i>
                        Borrow/Return
                    </a>
                    <ul class="collapse list-unstyled" id="borrowmenu">
                        <li>
                            <a href="borrow.html">Borrow</a>
                        </li>
                        <li>
                            <a href="return.html">Return</a>
                        </li>
                       
                    </ul>
  
                    <a href="#">
                        <!-- <i class="fa-solid fa-scanner-gun"></i> -->
                        <i class="fas fa-barcode"></i>
                       
                        Identify
                    </a>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <!-- <i class="fas fa-copy"></i> -->
                        <i class="fas fa-chart-line"></i>
                        Reports
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="transactions copy.html">Transactions</a>
                        </li>
                        <li>
                            <a href="overdue.html">Overdue</a>
                        </li>
                        <li>
                            <a href="#">Defaulters</a>
                        </li>
                        <li>
                            <a href="Instock.html">Instock</a>
                        </li>
                        <li>
                            <a href="damaged">Damaged</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                            <i class="fas fa-cog fa-spin"></i>


                        Settings
                    </a>
                </li>
                
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
                <div class="container-fluid">
<!-- button collapsible -->
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <!-- <span>Toggle Sidebar</span> -->
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
   <!-- searchbar  start-->
   <div class="p-0 bg-light rounded rounded-pill shadow-sm  text-center m-4">
    <div class="input-group">
      <input type="search" placeholder="What're you searching for?" aria-describedby="button-addon1" class="form-control border-0 bg-light">
      <div class="input-group-append">
        <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i class="fa fa-search"></i></button>
      </div>
    </div>
  </div>
    <!-- searchbar  end-->

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        
                        <ul class="nav navbar-nav ml-auto">
                           
                            <li class="nav-item active">
                                <a class="nav-link" href="#">
                                    <!-- <i class="far fa-user-circle fa-2xl "></i> -->
                                    <i class="fas fa-bell fa-2xl "></i>
                                </a>
                               
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <span class="badge badge-pill badge-warning"style="float:"> 134</span>
                                <a class="nav-link" href="/News/">News<span class="sr-only">(current)<m:-15px/span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.html"> 
                                    <i class="fas fa-sign-out-alt fa-2xl "></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
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
          
         
          
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
 
    

</body>

</html>