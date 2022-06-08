<a href="../forms/register.php">
                        <i class="fas fa-feather-alt"></i>
                        Register
                    </a>
                    <a href="#borrowmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <!-- <i class="fas fa-copy"></i> -->
                        <i class="fa-solid fa-hand-holding-dollar"></i>
                        Transact
                    </a>
                    <ul class="collapse list-unstyled" id="borrowmenu">
                        <li>
                            <a href="../forms/borrow.php">Borrow</a>
                        </li>
                        <li>
                            <a href="../forms/return.php">Return</a>
                        </li>
                       
                    </ul>
  
                    <a href="../forms/identify.php">
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
                            <a href="../reports/transcations.php">Transact</a>
                        </li>
                        <!-- <li>
                            <a href="../reports/overdue.php">Overdue</a>
                        </li> -->
                        <!-- <li>
                            <a href="../reports/defaulters.php">Defaulters</a>
                        </li> -->
                        <li>
                            <a href="../reports/instock.php">Instock</a>
                        </li>
                        <li>
                            <a href="../reports/damaged.php">Damaged</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="../settings/profile.php">
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
    <!-- <div class="input-group">
      <input type="search" placeholder="What're you searching for?" aria-describedby="button-addon1" class="form-control border-0 bg-light">
      <div class="input-group-append">
        <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i class="fa fa-search"></i></button>
      </div>
    </div> -->
  </div>
    <!-- searchbar  end-->
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <!-- <li class="nav-item active">
                                <a class="nav-link" href="#">
                                    <i class="fas fa-bell fa-2xl "></i>
                                </a> 

                            </li> -->
                            <li class="nav-item">
                            <div class="dropdown mydropdowncss">
                            <a href="#" class=" dropdown-toggle text-white" data-toggle="dropdown"><i class="fas fa-bell fa-2xl  "></i> <span class="caret"></span></a> 
                            <ul class="dropdown-menu bg-secondary text-light  ">
                            <li >LOGGED IN AS;</li>
                                <li>Name:<?php echo $_SESSION['name']?></li>
                                
                                <!-- <li><a href="#">Contact</a></li>
                                <li><a href="#">Gallery</a></li> -->
                            </ul>
                             </div>      
                            </li>
                           
                            <li class="nav-item ">
                                <a class="nav-link text-white" href="../powerscripts/logout.php"> 
                                    <i class="fas fa-sign-out-alt fa-2xl "></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>