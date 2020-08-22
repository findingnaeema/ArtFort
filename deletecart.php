<?php
include 'connect-db.php';

  $id = $_GET['id'];

  $con = mysqli_connect($host, $user, $pwd, $db, $port);
 
  $sql = "DELETE FROM cart WHERE orderId = $id";
  $con->query($sql);

  $con->close();

  header("location: cart.php");
?>

