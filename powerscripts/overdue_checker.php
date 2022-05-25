<?php
require("databaseconnection/config.php");//include connection to database
//construct query
$sql='SELECT  id,return_date  FROM borrow where condition_="borrowed"';
//make the query
$result=mysqli_query($con,$sql);
//counting of records with damaged items
$borrowed_count=mysqli_num_rows($result);
//fetch the results from the query as an array
$borrows=mysqli_fetch_all($result,MYSQLI_ASSOC);
foreach($borrows as $borrow ){
    $date=date("Y-m-d");//get todays date
    $id=$borrow['id'];
    if($date>$borrow['return_date']){//compare whether todays date is greater than return date
        $status="overdue";
        
        //prepare an update statement where to upate the status column to overdue
        $sql = "UPDATE borrow SET status_=?  WHERE id=? ";
        //make the query and pass connection
        $stmt = mysqli_prepare($con,$sql);
        //bid parameters
         mysqli_stmt_bind_param($stmt, "si",$status, $id);
        mysqli_stmt_execute($stmt);
    }

}

//ree thersult o query rom memory
mysqli_free_result($result);
//close connection
mysqli_close($con);


?>