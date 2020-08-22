






<?php 
//edit wish list
include 'connect-db.php';
include 'header.php'; 
$stuff1 = array();
//$uesrId = 1;
if(isset($_SESSION['id'])){
    $uesrId  = $_SESSION['id'];

$query = "SELECT s.id, s.name as sname, s.img  as img,s.price as price , w.productId as usprodId ,w.userId as usid
         FROM stuff1 s, tblwishlist w where s.id = w.productId and w.userId = $uesrId";


$result = mysqli_query($con, $query);
 
while($row = mysqli_fetch_assoc($result)){     
    $stuff1[$row['id']] =array(
        "pid" => $row['usprodId'],
        "name" => $row['sname'],
        "img" => $row['img'],
        "price" => $row['price']
    );     
}

?>

<section class="services">
<div id="content">

<div class="page shirts section">
    <div class="wrapper">
        <h1>Favorite Items List</h1>
        <ul class="products">
            <?php foreach($stuff1 as $k => $i) {?>
            <li>
                <img class="img-thumbnail" src="<?php echo $i["img"]; ?>"alt="<?php echo $i["name"]; ?>"/>
                <div class="wishlist" >
                    <span class = "label label-default">Price : $<?php echo $i["price"] ?></span>
                    
                    <?php if(isset($_SESSION['id'])){ 
                    $userid = $_SESSION['id'];
                    $productid =  $i["pid"];                    
                    echo '<a href="" id="editwish" onclick="javascript:addToWish('.$productid.','.$userid.');"> <i class="fa fa-heart" aria-hidden="true"></i></a>';                    
                    } ?>
                    <a href=item.php?id=<?php echo $k;?>>View Details</a>
                  
                </div>
            </li>
            <?php } 
            }
            ?>
            
        </ul>    
    </div>    
 </div>
</div></section>
<?php include 'footer.php'; ?>
<script>
function addToWish(productid, userid){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {			
				if (this.responseText == "success") {
				    alert(this.responseText);
                    header('Location:editwishlist.php');
                    
				}
			}
		};		
        xhttp.open("POST", "deletewishlist.php", true);
		xhttp.setRequestHeader("Content-type",
				"application/x-www-form-urlencoded");
		var parameters = "userId=" + userid + "&productId="
				+ productid;
		xhttp.send(parameters);


}
</script>