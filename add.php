<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">


<?php 
include 'header.php';
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


if(isset($_POST['add']))
{

    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $price = $_POST['price'];

    $file_name = basename($_FILES['image']['name']);
    $tmp  = $_FILES['image']['tmp_name'];
    $type = $_FILES['image']['type'];
    $size = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    


    //STEP 1: Construct the Destination Path
    $extension = explode(".", $file_name);
    $ext = end($extension);
    $dest = "assets/img/$pid.$ext";

    $accept = array('png', 'jpg', 'jpeg');

    

    //STEP 2: CHECK 3 FACTORS: SIZE, TYPE and ERROR
    if(!$error and $size <= 500000 and in_array($ext, $accept))
    {
       
        //STEP 3: Move the uploaded file
        $move_result = move_uploaded_file($tmp, $dest);        
        
        if($move_result)
        {
            //STEP 4: Create the Query
            $query = "INSERT INTO artsupplies SET id=$pid, img = '$dest', name= '$name', price = $price";
            

            //STEP 5: Run the Query
            $result = mysqli_query($con, $query);        
        }
        else{
            $result = 0;
        }
    }
    else{
        $result =0;
    }
}


?>


<section class="sevices">
<div id="content">
<div class="page section">

    <h1 style="text-align:center;font-transform: uppercase;font-style: italic;">Add Item</h1>

    <?php if(isset($result) and $result) { ?>   
    <p>Item added successfully to the Database</p>
    <?php } else {if(isset($result) and !$result) { ?>
    <p>Sorry Item was not added</p>
    <?php } else { ?>
    

                <form id="contact" name="add" method="POST" action="add.php" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <th>
                                <label for="pid">Product-ID*</label>
                            </th>
                            <td>
                                <input type="text" name="pid" id="pid">
                                
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="name">Product Name*</label>
                            </th>
                            <td>
                                <input type="text" name="name" id="name">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="image">Upload Image</label>
                            </th>
                            <td>
                                <input type="file" name="image" id="image">
                                <span style="font-size: 0.6em; font-style: italic;">(Maximum 500 KB)</span>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="price">Price*</label>
                            </th>
                            <td>
                                <input type="text" name="price" id="price">
                                
                            </td>
                        </tr>                    
                    </table>
                    <input type="submit" value="Add" name="add" id="add"/>

                </form>
                
    <?php } } ?>

    </div>
</div>
 </section>

 <?php include 'footer.php' ?>