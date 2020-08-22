<?php
session_start();

if(isset($_SESSION['admin']))
{
    session_unset();
    session_destroy();
    header("Location: index.php");
}

//session_start();
session_destroy();
//header("Location:Login.php");


$title = "Item Description";
include 'header.php';

?>
<div id="content">
	<div class="page section">
	    <h1>Logging Off, bye!</h1>
	</div>
</div>

<?php include 'footer.php'; ?>