
<?php
//#1 create DB connection variables
$host = "localhost";
$user = "root";
$pwd = "";
$db = "personal_db";
$port = '3307';

//#2 establish the connection
$con = mysqli_connect($host, $user, $pwd, $db, $port);

//#3 check fo errors
if (mysqli_connect_errno($con)) {
	echo mysqli_connect_error();
	exit();
}
?>