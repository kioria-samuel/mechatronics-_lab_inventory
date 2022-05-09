<?php
//check whether the user is logged in
require_once('powerscripts/logincheck.php');
?>
<!DOCTYE html>
<html>
    <?php include('basic_template/header.php');?>
    <!-- begin  o dashboard -->
 <main role="main" class="col-md-9 ml-sm-auto col-lg-12 px-4">
     <!--end   o dashboard -->
 <h3 class="text-white">DEFAULTERS</h3>
 <hr>
 <div class="table-responsive bg-white">
 <button class="btn btn-success" onclick="printTable();"><span class="glyphicon glyphicon-print"></span> Print</button>
                            <table id="mytablet" style="width:100%" class="table table-striped table-bordered table-white">
                              <thead>
                                <tr>
                                  <th>Asset No</th>
                                  <th>Asset</th>
                                  <th>Name</th>
                                  <th>Reg No</th>
                                  <th> Date</th>
                                  <th>Contact</th>
                                </tr>
                              </thead>
                              <tbody>
                                
                                <tr>
                                  <td>ASSET NO</td>
                                  <td>Asset</td>
                                  <td>Name</td>
                                  <td>Reg No</td>
                                  <td>Date</td>
                                  <td>Contact</td>
                                </tr>
                                <tr>
                                  <td>3456767</td>
                                  <td>arduino uno</td>
                                  <td>chwasi asa</td>
                                  <td>E022-01-xxx/2019</td>
                                  <td>2011/07/25</td>
                                  <td>0117867678</td>
                                </tr>
                                <tr>
                                  <td>345679</td>
                                  <td>multimeter</td>
                                  <td>kijana mtiifu</td>
                                  <td>E022-01-xxx/2019</td>
                                  <td>2021/04/25</td>
                                  <td>011785678</td>
                                </tr>
                                <tr>
                                  <td>3456767</td>
                                  <td>arduino uno</td>
                                  <td>chwasi asa</td>
                                  <td>E022-01-xxx/2019</td>
                                  <td>2011/07/25</td>
                                  <td>0117867678</td>
                                </tr>
                               
                                <tr>
                                  <td>345679</td>
                                  <td>multimeter</td>
                                  <td>kijana mtiifu</td>
                                  <td>E022-01-xxx/2019</td>
                                  <td>2021/04/25</td>
                                  <td>011785678</td>
                                </tr>
                                <tr>
                                  <td>3456767</td>
                                  <td>arduino uno</td>
                                  <td>chwasi asa</td>
                                  <td>E022-01-xxx/2019</td>
                                  <td>2011/07/25</td>
                                  <td>0117867678</td>
                                </tr>
                               
                                <tr>
                                  <td>345679</td>
                                  <td>multimeter</td>
                                  <td>kijana mtiifu</td>
                                  <td>E022-01-xxx/2019</td>
                                  <td>2021/04/25</td>
                                  <td>011785678</td>
                                </tr>
                                <tr>
                                  <td>3456767</td>
                                  <td>arduino uno</td>
                                  <td>chwasi asa</td>
                                  <td>E022-01-xxx/2019</td>
                                  <td>2011/07/25</td>
                                  <td>0117867678</td>
                                </tr>
                               
                                <tr>
                                  <td>345679</td>
                                  <td>multimeter</td>
                                  <td>kijana mtiifu</td>
                                  <td>E022-01-xxx/2019</td>
                                  <td>2021/04/25</td>
                                  <td>011785678</td>
                                </tr>
                                <tr>
                                  <td>3456767</td>
                                  <td>arduino uno</td>
                                  <td>chwasi asa</td>
                                  <td>E022-01-xxx/2019</td>
                                  <td>2011/07/25</td>
                                  <td>0117867678</td>
                                </tr>
                               
                                <tr>
                                  <td>345679</td>
                                  <td>multimeter</td>
                                  <td>kijana mtiifu</td>
                                  <td>E022-01-xxx/2019</td>
                                  <td>2021/04/25</td>
                                  <td>011785678</td>
                                </tr>
                                <tr>
                                  <td>3456767</td>
                                  <td>arduino uno</td>
                                  <td>chwasi asa</td>
                                  <td>E022-01-xxx/2019</td>
                                  <td>2011/07/25</td>
                                  <td>0117867678</td>
                                </tr>
                               
                                <tr>
                                  <td>345679</td>
                                  <td>multimeter</td>
                                  <td>kijana mtiifu</td>
                                  <td>E022-01-xxx/2019</td>
                                  <td>2021/04/25</td>
                                  <td>011785678</td>
                                </tr>
                                <tr>
                                  <td>3456767</td>
                                  <td>arduino uno</td>
                                  <td>chwasi asa</td>
                                  <td>E022-01-xxx/2019</td>
                                  <td>2011/07/25</td>
                                  <td>0117867678</td>
                                </tr>
                               
                                <tr>
                                  <td>345679</td>
                                  <td>multimeter</td>
                                  <td>kijana mtiifu</td>
                                  <td>E022-01-xxx/2019</td>
                                  <td>2021/04/25</td>
                                  <td>011785678</td>
                                </tr>
                                <tr>
                                  <td>3456767</td>
                                  <td>arduino uno</td>
                                  <td>chwasi asa</td>
                                  <td>E022-01-xxx/2019</td>
                                  <td>2011/07/25</td>
                                  <td>0117867678</td>
                                </tr>
                               
                               
                               
                              </tbody>
                            </table>
 <!-- <div class="table-responsive">
   <table class="table table-dark">
     <thead>
       <tr>
         <th scope="col">#</th>
         <th scope="col">First</th>
         <th scope="col">Last</th>
         <th scope="col">Position</th>
       </tr>
     </thead>
     <tbody>
       <tr>
         <th scope="row">1</th>
         <td>Mark</td>
         <td>Otto</td>
         <td>Project Manager</td>
       </tr>
       <tr>
         <th scope="row">2</th>
         <td>Jacob</td>
         <td>Thornton</td>
         <td>JS developer</td>
       </tr>
       <tr>
         <th scope="row">3</th>
         <td>Larry</td>
         <td>Bird</td>
         <td>Back-end developer</td>
       </tr>
       <tr>
         <th scope="row">4</th>
         <td>Martin</td>
         <td>Smith</td>
         <td>Back-end developer</td>
       </tr>
       <tr>
         <th scope="row">5</th>
         <td>Kate</td>
         <td>Mayers</td>
         <td>Scrum master</td>
       </tr>
     </tbody>
   </table>-->
 </div> 
<!-- start o cards  -->
<h3 class="text-white ">STATISTICS</h3>
<hr>
<!-- start o cards -->
<div class="row">
    <div class="col-sm-2">
      <div class="card">
        <div class="card-body bg-white">
          <h5 class="card-title text-warning">Damaged</h5>
          <hr>
          <h6 class="card-text">Total:</h6>
          <!-- <p class="card-text">Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.</p> -->
          <a href="../reports/damaged.php" class="btn btn-primary">view in detail</a>
        </div>
      </div>
    </div>
    <!-- borrowed card -->
    <div class="col-sm-2">
      <div class="card">
        <div class="card-body bg-white">
          <h5 class="card-title text-warning">Borrowed</h5>
          <hr>
          <h6 class="card-text">Total:</h6>
          <!-- <p class="card-text">Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.</p> -->
          <a href="../reports/transcations.php" class="btn btn-primary">view in detail</a>
        </div>
      </div>
    </div>
    <!-- end o borrowed card -->
    <!-- start o Defaulters card -->
    <div class="col-sm-2">
      <div class="card">
        <div class="card-body bg-white">
          <h5 class="card-title text-warning">Defaulters</h5>
          <hr>
          <h6 class="card-text">Total:</h6>
          <!-- <p class="card-text">Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.</p> -->
          <a href="../reports/defaulters.php" class="btn btn-primary">view in detail</a>
        </div>
      </div>
    </div>
    <!-- end  o Defaulters card -->
    <!-- start o instock card -->
    <div class="col-sm-2">
      <div class="card">
        <div class="card-body bg-white">
          <h5 class="card-title text-warning">Instock</h5>
          <hr>
          <h6 class="card-text">Total:</h6>
          <!-- <p class="card-text">Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.</p> -->
          <a href="../reports/instock.php" class="btn btn-primary">view in detail</a>
        </div>
      </div>
    </div>
    
  </div>
  <h3 class="text-white">Quick links</h3>
  <hr class="">
  <div class="row">
    <div class="col-sm-2">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title text-warning">Reports</h5>
          <hr>
          <!-- <p class="card-text">Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.</p> -->
          <h6 class="card-text"><a href="../reports/damaged.php">Damaged </h6>
          <h6 class="card-text"><a href="../reports/overdue.php">Overdue </h6>
          <h6 class="card-text"><a href="../reports/transcations.php">Transactions</h6>
          <h6 class="card-text"><a href="../reports/instock.php">Instock</h6>
    
          <!-- <a href="#" class="btn btn-primary">Print</a> -->
        </div>
      </div>
    </div>
    <div class="col-sm-2">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title text-warning">Forms</h5>
          <hr>
          <h6 class="card-text"><a href="../forms/borrow.php"> Borrow</h6>
          <h6 class="card-text"><a href="../forms/identify.php">Identify </h6>
          <h6 class="card-text"><a href="../forms/register.php">Register</h6>
          <h6 class="card-text"><a href="../forms/return.php">Return</h6>
          <!-- <a href="#" class="btn btn-primary">Print</a> -->
        </div>
      </div>
    </div>
  </div>
  <h3>Statistics</h3>
<hr>

  <!-- reports section -->
<!-- start o cards -->
 </main>
        
    <?php include('basic_template/footer.php');?>
</html>
