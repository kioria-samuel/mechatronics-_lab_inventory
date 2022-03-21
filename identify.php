<!DOCTYE html>
<html>
//include the header redundant code or every page
    <?php include('header.php');?> 
    <!-- start of register form -->
    <section class="container-fluid">
      <section class="row justify-content-left p-5">
        <section class="col-12 col-sm-6 col-md-4">
          <form class="form-container border-radius:20px ">
            <h4 class="text-center font-weight-bold"> IDENTIFY ASSET </h4>
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
              <label for="inputmodel" class="col-sm-2 col-form-label">Model</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputmodel" placeholder="inputmodel">
              </div>
            </div>
            
            <div class="form-inline-block">

              <!-- <button type="save" class="btn btn-success col-sm-3  "><i class="fa fa-floppy-o"></i>|save</button> -->
              <button type="add" id="types" class="btn btn-success col-sm-2"><a href="register.html"></a><i class="fa fa-plus"></i>|add</button>
              <!-- <button type="scan" class="btn btn-success col-sm-3  "><i class="fa fa-trash"></i>|delete</button> -->


             
                
            </div>
            
          </form>
    
        </section>

      </section>
   

    </section>
    <?php include('footer.php');?>//include the footer redundant code or every page
</html>