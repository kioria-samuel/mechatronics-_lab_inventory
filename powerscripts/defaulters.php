<?php



//construct query
$sql='SELECT  asset_no,reg_no,condition_,status_,contact,email  FROM borrow where status_="Uncleared" OR status_="overdue"';
//make the query
$result=mysqli_query($con,$sql);
//counting of records with damaged items
$damaged_count=mysqli_num_rows($result);
//fetch the results from the query as an array
$borrows=mysqli_fetch_all($result,MYSQLI_ASSOC);


//ree thersult o query rom memory
mysqli_free_result($result);
//close connection
mysqli_close($con);

//print_r($assets);



?>