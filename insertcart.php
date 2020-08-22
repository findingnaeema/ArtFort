<?php
require_once ('connect-db.php');

  $uid = $_GET['perid'];
  $pid = $_GET['itemid'];


if(isset($_GET['perid']) && isset($_GET['itemid'])){
    
    
  $sql = "INSERT INTO cart(perid,itemid) VALUES (" . $uid . "," . $pid . ") ";

  if($result = mysqli_query($con, $sql)){
    header("location: stuff.php");
    
    $con->close();
  }  

  echo'hello from the other side';
 
}else{
    echo '("Database Not connected!")';
}
?>