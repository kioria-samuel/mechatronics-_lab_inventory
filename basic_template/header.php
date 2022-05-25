<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>mechatronics lab inventory</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="/css/style4.css">

    <!-- Font Awesome JS -->
    <script src="https://kit.fontawesome.com/cf3b94705e.js" crossorigin="anonymous"></script>
     <!-- jquery cdn link -->
     <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <!-- adding datable cdn -->
      <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
     <!-- css  jquery data table link -->
     <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"> 
<!-- calendar  -->
<link href="/ECN/Ztools/CalendarControl/CalendarControl.css"
      rel="stylesheet" type="text/css">
</head>
<body>
<div class="wrapper ">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header d-block">
            <i class="far fa-clipboard fa-3x"></i>
            <!-- <i class="fas fa-books-medical"></i> -->
            <!-- <i class="fa-solid fa-books-medical"></i> -->
            <!-- <i class="fas fa-pallet fa-3x text-centre"></i> -->
                <h3 class="text-centre">Mechatronics Inventory </h3>
                <strong>MLI</strong>
            </div>

            <ul class="list-unstyled components">
                
                <li>
                    <a href="../test.php">
                        <i class="fas fa-home"></i>
                        Home
                    </a>
                <li>
                    <a href="../forms/register.php">
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
                            <a href="../reports/transcations.php">Transactions</a>
                        </li>
                        <li>
                            <a href="../reports/overdue.php">Overdue</a>
                        </li>
                        <li>
                            <a href="../reports/defaulters.php">Defaulters</a>
                        </li>
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
                            <a href="#" class=" dropdown-toggle text-dark" data-toggle="dropdown"><i class="fas fa-bell fa-2xl  "></i> <span class="caret"></span></a> 
                            <ul class="dropdown-menu bg-secondary text-light  ">
                            <li>LOGGED IN AS;</li>
                                <li>Name:<?php echo $_SESSION['name']?></li>
                                <li>Log id:<?php echo  $_SESSION['id']?> </li>
                                <!-- <li><a href="#">Contact</a></li>
                                <li><a href="#">Gallery</a></li> -->
                            </ul>
                             </div>      
                            </li>
                           
                            <li class="nav-item">
                                <a class="nav-link" href="../powerscripts/logout.php"> 
                                    <i class="fas fa-sign-out-alt fa-2xl "></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            
 