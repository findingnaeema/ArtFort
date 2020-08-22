<!--
Into this file, we create a layout for login page.
-->

<?php
session_start();
include_once('connect-db.php');
include_once('header.php');



if(isset($_POST['loginUser'])){
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $password = MD5($pwd);
    $sql = "SELECT * FROM tblusers WHERE Email='$email' AND `Password`='$password'";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
    	while($row = mysqli_fetch_assoc($result)){
		    $id = $row["id"];
		    $email = $row["Email"];		    
		    $_SESSION['id'] = $id;
		    $_SESSION['email'] = $email;
	    }
	    header("Location: index.php");
    }
    else{
    
      echo "<script type='text/javascript'>alert('Invalid email or password');</script>";
    }
}



?>
<br>
<br>
<br>
<br>
<div id="frmRegistration">
<form class="form-horizontal" method="POST" action="loginUser.php">
    
    <h1>User Login</h1>	
    <div class="form-group">
        <label class="control-label col-sm-2" for="email">Email:</label>
        <div class="col-sm-6">
        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
        </div>
    </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Password:</label>
    <div class="col-sm-6"> 
      <input type="password" class="form-control" name="password" id="pwd" placeholder="Enter password">
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="loginUser" class="btn btn-primary">Login</button>
      <p>Don't have an account? <a href="registerUser.php">Sign up now</a>.</p>

    </div>
  </div>
</form>
</div>



<?php
//include_once('footer.php');
?>