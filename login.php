<?php

require_once('connect-db.php');


//session_start();
include 'header.php';

$title = "Login";


//STEP 1: DEFINE VARIABLES
$host = 'localhost';
$user = 'root';
$pwd = '';
$db = 'art';
$port = '3307';

//STEP 2: CONNECT TO THE DB
$con = mysqli_connect($host,$user,$pwd,$db, $port);

//STEP 3: CHECK FOR ERRORS
if(mysqli_connect_errno($con))
{
    echo mysqli_connect_error();
}

if(isset($_POST['uid'],$_POST['pwd']))
{
    $uname = $_POST['uid'];
    $pwd = md5($_POST['pwd']);

    $query = "SELECT * FROM user WHERE username='$uname' AND password='$pwd'";
    $result = mysqli_query($con, $query);
    
    if($result)
    {
        if((mysqli_num_rows($result) == 1))
        {
            $_SESSION['admin'] = $uname;
            header('Location: login.php?status=valid');
        }
        else
        {
            header('Location: error.php?status=invalid');
        }
    }
        
 }
?>

<br>
<br>
<br>
<br>

<section id="services">
<div id="content">
  <div class="page section">
    <h1>Administrator Login</h1>

    <form id="login" name="login" method="POST"  onsubmit="return validate_login();">

      <?php if(isset($_GET['status']) and $_GET['status']==="invalid") { ?>          
          <p class="login-error">Wrong username/password combination. Please Try Again Later</p>
      <?php } ?> 

      <table>
          <tr>
               <th>
                    <label for="uid">Login-ID</label>
               </th>
               <td>
                    <input type="text" name="uid" id="uid">
                    <span class="error" id="ename">* Required </span>
               </td>
          </tr>
          <tr>
               <th>
                     <label for="pwd">Password</label>
               </th>
               <td>
                      <input type="password" name="pwd" id="pwd">
                      <span class="error" id="epwd">* Required </span>
               </td>
          </tr>
          </table>
         

        <input type="submit" value="Login" name="submit" id="submit">
    </form>
  </div>
</div> </section>
<div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="#">Web design</a></li>
                            <li><a href="#">Development</a></li>
                            <li><a href="#">Hosting</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3>About</h3>
                        <ul>
                            <li><a href="#">Company</a></li>
                            <li><a href="#">Team</a></li>
                            <?php if(!isset($_SESSION['admin'])) { ?>
                                	<li><a href="login.php">Login</a></li>
                                <?php } else { ?>
                                	<li><a href="admin.php">Admin_Panel</a></li> 
                                    <li><a href="logout.php">Logout</a></li> 
                                 <?php } ?>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3>ART FORT</h3>
                        <p>This company aims to make it easy for art fanatics to get their art supplies from a number of unique cllections, all a click away.</p>
                    </div>
                    <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
                </div>
                <p class="copyright">ART FORT © 2020</p>
            </div>
        </footer>
    </div>   