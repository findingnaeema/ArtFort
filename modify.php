<?php
session_start();

$title = "Modify Item";
include 'header.php'; 
include 'connect-db.php';

if(!isset($_SESSION['admin']))
{
    header('Location: error.php');
}

//STEP 4: CREATE THE QUERY
$query = "SELECT * FROM artsupplies";

//STEP 5: RUN THE QUERY
$result = mysqli_query($con,$query);
$artsupplies = array();

//STEP 6: RETRIEVE VALUES FROM RESULT
while($row = mysqli_fetch_assoc($result))
{

$artsupplies[$row['id']] = array(
                    'ID' => $row['id'],
                    'name'=>$row['name'],
                    'img'=>$row['img'],
                    'price'=>$row['price']
                    );

}

if(isset($_POST['item'],$_POST['update']))
{
    header("Location: update.php?id=".$_POST['item']);
    exit();
}

if(isset($_POST['item'],$_POST['delete']))
{
    header('Location: delete.php?id='.$_POST['item']);
    exit();
}

?>

<div class="content">
  <div class="breadcrumb"><a href="admin.php">Back to Control Panel</a></div>
  <div class="page section">
    <h1>Modify Item</h1>
    
    <form id="contact" name="modify" method="POST" action="modify.php">
        <table>                        
            <?php foreach($artsupplies as $i) {?>
                <tr>
                    <th>
                        <input type="radio" name="item" id="item" value="<?php echo $i['ID']; ?>"/>
                    </th>
                    <td>
                        <label><?php echo $i['name']; ?></label>
                    </td>
                </tr>
            <?php } ?>                                            
        </table>
        <input type="submit" name ="update" id="update" value="Update" >
        <input type="submit" name="delete" id="delete" value="Delete">
    </form>   
   </div>
</div>

<?php include 'footer.php' ?>