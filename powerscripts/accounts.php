<?php
//include the connection file 
require('databaseconnection/config.php');


//construct query
$sql='SELECT  username,email FROM accounts where activation_status="dormant"';
//make the query
$result=mysqli_query($con,$sql);
//counting of records with damaged items
//$damaged_count=mysqli_num_rows($result);
//fetch the results from the query as an array
$accounts=mysqli_fetch_all($result,MYSQLI_ASSOC);


//ree thersult o query rom memory
mysqli_free_result($result);
//close connection
mysqli_close($con);

//print_r($assets);



?>