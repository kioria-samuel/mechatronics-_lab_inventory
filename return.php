<!DOCTYE html>
<html>
    <?php include('header.php');?>
    <!-- start of register form -->
    <section class="container-fluid">
      <section class="row justify-content-left p-5">
        <section class="col-12 col-sm-6 col-md-4">
          <form class="form-container border-radius:20px ">
            <h4 class="text-center font-weight-bold"> RETURN  ASSET </h4>
            <div class="form-group row">
              <button type="scan" class="btn btn-success col-sm-2  "><i class="fa fa-barcode"></i>|scan</button>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="scannedbarcode" placeholder="input_from_scanner">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputasset" class="col-sm-2 col-form-label">Asset</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputasset" placeholder="assset name">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputtechname" class="col-sm-2 col-form-label">Tech Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputtechanme" placeholder="inputtechname">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputtechname" class="col-sm-2 col-form-label">Department</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputtechanme" placeholder="inputtechname">
              </div>
            </div>
            
         
            <div class="form-group row">
              <label for="inputRegno" class="col-sm-2 col-form-label">REG NO</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputRegno" placeholder="inputregno">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputtechname" class="col-sm-2 col-form-label">Quantity</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputtechanme" placeholder="quantity">
              </div>
            </div>
           
            <div class="form-group row">
              <label for="inputdate" class="col-sm-2 col-form-label">Borrow Date</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="date" placeholder="borrow date">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputtechname" class="col-sm-2 col-form-label">Return date</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputtechanme" placeholder="return_date">
              </div>
            </div>



            <div class="form-group row">
              <label for="inputtype" class="col-sm-2 col-form-label">Condition</label>
              <div class="col-sm-10">
                <!-- <input type="text" class="form-control" id="inputtype" placeholder="select"> -->
                <select class="form-control" id="typeselect">
                  <option>none</option>
                  <option>okey</option>
                  <option>damaged</option>  
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputtype" class="col-sm-2 col-form-label">Status</label>
              <div class="col-sm-10">
                <!-- <input type="text" class="form-control" id="inputtype" placeholder="select"> -->
                <select class="form-control" id="typeselect">
                  <option>none</option>
                  <option>cleared</option>
                  <option>Uncleared</option>
                  <option>Damaged</option>
                </select>
              </div>
            </div>
            
            <div class="form-inline-block">

             
              <button type="save" class="btn btn-success col-sm-3  "><i class="fa fa-floppy-o"></i>|save</button>
              <button type="add" class="btn btn-success col-sm-2  "><i class="fa fa-plus"></i>|add</button>
              <!-- <button type="scan" class="btn btn-success col-sm-3  "><i class="fa fa-trash"></i>|delete</button> -->

             
                
            </div>
            
          </form>
    
        </section>

      </section>
   

    </section>

    <?php include('footer.php');?>
</html>
