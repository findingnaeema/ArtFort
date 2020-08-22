<?php

require_once ('connect-db.php');

if(isset($_POST['userId']) && isset($_POST['productId'])){

    $uid = $_POST['userId'];
    $pid = $_POST['productId'];
    //print ($userid);
    //echo 'console.log($)';
    //echo 'console.log("Database connected!")';
    $checkIfExistQuery = "select * from tblwishlist where userId = '" . $uid . "' and productId = '" . $pid . "'";
    if ($result = mysqli_query($con, $checkIfExistQuery)) {
        $rowcount = mysqli_num_rows($result);
    }
    
    if ($rowcount == 0) {
        $insertQuery = "INSERT INTO tblwishlist(userId,productId) VALUES ('" . $uid . "','" . $pid . "') ";
        $result = mysqli_query($con, $insertQuery);
        echo "success";
    } else {
        echo "Already Voted!";
    }
}else{
    //echo 'console.log("Database Not connected!")';
}


?>