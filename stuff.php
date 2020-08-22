<?php

$title = "Stuff";
include 'header.php'; 
include 'connect-db.php';

$stuff1 = array();

 $query = "SELECT * FROM stuff1";
 
 $result = mysqli_query($con, $query);
if($result){
 
    while($row = mysqli_fetch_assoc($result)){     
    $stuff1[$row['id']] =array(
        "id" => $row['id'],
        "name" => $row['name'],
        "img" => $row['img'],
        "price" => $row['price']
    );     
    }
}
?>

<section class="services">
<div id="content">

<div class="page shirts section">
    <div class="wrapper">
        <h1>My Full Catalog of Stuff</h1>
        <ul class="products">
            <?php foreach($stuff1 as $k => $i) {?>
           <li>
                <img class="img-thumbnail" src="<?php echo $i["img"]; ?>"alt="<?php echo $i["name"]; ?>"/>
                <div class="wishlist" >
                    <span class = "label label-default">Price : $<?php echo $i["price"] ?></span>

                    <?php if(isset($_SESSION['id'])){     
                    $userid = $_SESSION['id'];
                    $productid =  $i["id"];                    
                    
                    echo '<a href="" id="addwish" 
                        onclick="javascript:addToWish('.$productid.','.$userid.')">
                        <i class="fa fa-heart" aria-hidden="true"></i></a>';
                    
                    echo '<a href="insertcart.php?perid='.$userid.'&itemid='.$productid.'" id="addcart"> 
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>';
                    }
                                   
                    ?>
                    <a href='item.php?id=<?php echo $k;?>'>View Details</a>
                   	
                   	
                </div>
            </li>
            <?php } ?>
            
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
				if (this.responseText != "success") {
				    alert(this.responseText);
				}
			}
		};		
        xhttp.open("POST", "insertwishlist.php", true);
		xhttp.setRequestHeader("Content-type",
				"application/x-www-form-urlencoded");
		var parameters = "userId=" + userid + "&productId="
				+ productid;
		xhttp.send(parameters);

}
    
   /* function addToCart(productid, userid){          
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {			
				if (this.responseText != "success") {
				    alert(this.responseText);
				}
			}
		};		
        xhttp.open("POST", "insertcart.php", true);
		xhttp.setRequestHeader("Content-type",
				"application/x-www-form-urlencoded");
		var parameters = "userId=" + userid + "&productId="
				+ productid;
		xhttp.send(parameters);*/


</script>