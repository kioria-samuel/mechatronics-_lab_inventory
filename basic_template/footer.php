
</div>

</div>
<footer class="text-center text-white fixed-bottom" style="background-color: #21081a;">
  <!-- Grid container -->
  <!-- <div class="container p-4">
  
  </div> -->
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color:#090318;">
    © <?php echo date("Y")?> Copyright:
    <a class="text-white" href="#">mechactronics lab</a>
    
  </div>
  <!-- Copyright -->
</footer>
<!-- jQuery CDN - Slim version (=without AJAX) -->
    
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <!-- toggling input ield in  -->
<script  type="text/javascript">
  $(document).ready(function(){
  $("select[name='action']").on('change',function(){
    if($(this).val()==1){
      $("input[name='add_quantity']").prop("disabled",false);
    }else{
      $("input[name='add_quantity']").prop("disabled",true);
    }
  });
});
</script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <!-- autofill date for the date input field -->
 <!-- <script type="text/javascript">
   const return_date = new Date()

// add 1 day to today
return_date.setDate(new Date().getDate() + 7)
      document.getElementById('date').value = return_date.toLocaleDateString('en-us', { weekday:"long", year:"numeric", month:"numeric", day:"numeric"}) ;
    </script> -->
     <!-- document ready function for sorting out table records -->
    <script >
  $(document).ready(function() {
    $("#mytable").dataTable();
} );
    </script>
     <script src="/ECN/Ztools/CalendarControl/CalendarControl.js"
        language="javascript"></script>
        <!-- reducing the deaulters report to 50 percent height -->
  <script>
          $(document).ready(function () {
  $('#mytablet').DataTable({
    "scrollY": "50vh",
    "scrollCollapse": true,
    dom: 'Bfrtip',
    buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
  });
  $('.dataTables_length').addClass('bs-select');
});
        </script>
        <!-- script for printing datatables -->
        <!-- <script>
          $(document).ready(function() {
    $('#mytablet').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
        </script> -->
        <!-- script or printing tables 
        <script>
          function printTable() {
	var el=document.getElementById("mytablet");
//	el.setAttribute('border', '1px');
//	el.setAttribute('cellpadding', '5');
	newPrint=window.open("");
	newPrint.document.write(el.outerHTML);
	newPrint.print();
	newPrint.close();
}
        </script> -->
        <!-- showin account details on hover -->
        <!-- <script>
$(function(){
    $('.mydropdownjQuery').hover(function() {
        $(this).addClass('open');
    },
    function() {
        $(this).removeClass('open');
    });
});
</script> -->

</body>