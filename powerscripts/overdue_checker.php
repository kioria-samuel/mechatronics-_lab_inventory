<?php
//initilize sowm error variables
$overdue_status=$mailing_status="";

require("databaseconnection/config.php");//include connection to database
//construct query
$sql='SELECT  borrow_id,asset_no,return_date,email  FROM borrow where status_="borrowed"';
//make the query
mysqli_query($con,$sql);
$result=mysqli_query($con,$sql);
    //counting of records with damaged items
$borrowed_count=mysqli_num_rows($result);
//fetch the results from the query as an array
$records=mysqli_fetch_all($result,MYSQLI_ASSOC);
foreach($records as $record ){
    $date=date("Y-m-d");//get todays date
   
    $id=$record['borrow_id'];
    $asset_no=$record['asset_no'];
     //send email  to deaulter
     $receiver = $record['email'];
    if($date>$record['return_date']){//compare whether todays date is greater than return date
        $status="overdue";
       
$subject = "overdue lab component";
$m1="honouring return dates increases your chances  of boorrowing components from the Lab kindly return the following items;n/";
$m2=$asset_no;
$body =$m1."".$m2 ;
$sender = "From:mechlab9@gmail.com";
if(mail($receiver, $subject, $body, $sender)){
    $mailing_status= "Email sent successfully to $receiver";
}else{
    $mailing_status="Sorry, failed while sending mail!";
}

        //prepare an update statement where to upate the status column to overdue
        $sql = "UPDATE borrow SET status_=?  WHERE borrow_id=? ";
        //make the query and pass connection
        $stmt = mysqli_prepare($con,$sql);
        //bid parameters
         mysqli_stmt_bind_param($stmt, "si",$status, $id);
        mysqli_stmt_execute($stmt);
        
        
    }else{
        $overdue_status="no overdue assets";
        
    }

}


//ree thersult o query rom memory
mysqli_free_result($result);
//close connection
mysqli_close($con);




?>