<?php

require_once ('connect-db.php');

if(isset($_POST['userId']) && isset($_POST['productId'])){

$uid = $_POST['userId'];
$pid = $_POST['productId'];

$checkIfExistQuery = "select * from tblwishlist where userId = '" . $uid . "' and productId = '" . $pid . "'";

if ($result = mysqli_query($con, $checkIfExistQuery)) {
    $rowcount = mysqli_num_rows($result);
}

if ($rowcount != 0) {    
    $deleteQuery = "DELETE FROM tblwishlist WHERE userId = '" . $uid . "' AND  productId = '" . $pid . "' ";
    echo $deleteQuery;
    $result = mysqli_query($con, $deleteQuery);
    echo "success";
} 
else{
    echo 'unsuccess';
}

}




?>

