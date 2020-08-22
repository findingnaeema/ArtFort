<!--
Into this file, we create a layout for registration page.
-->
<?php
include_once('header.php');
include_once('connect-db.php');

if(isset($_POST['createUser'])){
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $password = MD5($pwd);

    $sql = "INSERT INTO tblusers (Firstname,Lastname,Gender,Email,Password) VALUES ('$fname','$lname','$gender','$email','$password')";
    $result = mysqli_query($con, $sql);
    if($result){
	    header("Location: loginUser.php");
    }else{
	    echo "Error :".$sql;
    }
}

?>
<br>
<br>
<br>
<br>
<div id="frmRegistration">
<form class="form-horizontal" action="registerUser.php" method="POST">
	<h1>User Registration</h1>
	<div class="form-group">
    <label class="control-label col-sm-2" for="firstname">First Name:</label>
    <div class="col-sm-6">
      <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Enter Firstname">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="lastname">Last Name:</label>
    <div class="col-sm-6">
      <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Enter Lastname">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="lastname">Gender:</label>
    <div class="col-sm-6">
      <label class="radio-inline"><input type="radio" name="gender" value="Male">Male</label>
	  <label class="radio-inline"><input type="radio" name="gender" value="Female">Female</label>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-6">
      <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Password:</label>
    <div class="col-sm-6"> 
      <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password">
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="createUser" class="btn btn-primary">Submit</button>
      <p>Already have an account? <a href="loginUser.php">Login here</a>.</p>

    </div>
  </div>
</form>
</div>