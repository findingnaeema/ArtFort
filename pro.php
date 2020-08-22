<!--
Into this file, we write a code for display user information.
-->

<?php
//include_once('header.php');
require_once('connect-db.php');
//session_start();
$id ='';
if(isset($_SESSION['id'])){
  $id = $_SESSION['id'];
}
if(isset($_POST['update_profile'])){   
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password =MD5( $_POST['password']);
    //echo($id);
    $sql = "UPDATE tblusers SET Firstname='$first_name',Lastname='$last_name',Gender='$gender',Password='$password'  WHERE id='$id' ";
    //echo($sql);
    if ($con->query($sql) === TRUE) {
      echo "Record updated successfully";
      header("Location: loginUser.php");
    } else {
      echo "Error updating record: " . $con->error;
    }
}

$sql = "SELECT * FROM tblusers WHERE ID='$id'";
//echo $sql;
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{       
       
              
?>

<body>
<h1>Edit Profile </h1>

    
         Name
      <input type="text"  class="form-control"  name="first_name" value="<?php echo ($row["Firstname"]); ?>"/>
        Last Name
       <input type="text"  class="form-control"  name="last_name" value="<?php echo ($row["Lastname"]); ?>"/>
        Gender
  <input type="text"  class="form-control"  name="gender" value="<?php echo ($row["Gender"]); ?>"/>
        Email
<input type="text"  class="form-control"  name="email" value="<?php echo ($row["Email"]); ?>"/>
        New Passowrd
        <input type="text"  class="form-control"  name="password" value=""/><
      
          <input type="submit"  class="btn btn-primary" value="update" name="update_profile"/>            
 
</body>
<?php
  }

}
?>



