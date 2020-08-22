

<?php
session_start();

$title = "Admin CPanel";
include 'header.php';
include 'connect-db.php';

if(!isset($_SESSION['admin']))
{
	header('Location: error.php');
}

?>


<section id="services">
<div id="content">
	<div class="section shirts latest">
		<div class="wrapper">
			<h2 style="margin: 20px;">Administrator Control Panel</h2>
            <div style="width: 50%; margin: 0 auto;">
				<ul class="products">
					<li><a href="add.php">
						<img  src="assets/img/icons8-plus-200.png">
						<p>Add Items</p>
						</a>
					</li><li>
						<a href="modify.php">
						<img src="assets/img/icons8-settings-200.png">
						<p>Modify Items</p>
						</a>
					</li>								
				</ul>
            </div>
		</div>
	</div>
</div> </section>


<div class="footer-dark">
       <?php include 'footer.php'; ?>
    </div>  
