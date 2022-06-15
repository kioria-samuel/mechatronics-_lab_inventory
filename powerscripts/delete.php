<?php
if(isset($_POST['delete'])){
    //make a query
    $sql="DELETE FROM borrow WHERE borrow_id=?";
    $stmt = mysqli_prepare($con, $sql);
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "i", $borrowid);
    $borrowid=trim($_POST['borrow_id']);
    if(mysqli_stmt_execute($stmt)){
        $status="record deleted succesfully";
    }else{
        $status="query error";
    }
}
?>