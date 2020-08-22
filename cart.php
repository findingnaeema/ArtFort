<?php
include('header.php');
include('connect-db.php');

$uid = $_SESSION['id'];

$query = "SELECT i.img, i.name, i.price, i.Id, c.orderId 
FROM stuff1 i INNER JOIN cart c ON i.id=c.itemid 
WHERE i.Id IN 
( SELECT itemId 
FROM cart 
WHERE PerID = $uid );";

$result = mysqli_query($con, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $item[$row['orderId']] = array(
            "name" => $row['name'],
            "img" => $row['img'],
            "price" => $row['price'],
        );
    }
}
$counter = 0;
$prices = 0;

echo '  <br> <br> <br>';

?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <div class="colour">
        <div class="wrapperr">
            <?php if (!empty($item)) { ?>
                <div class="itemm-wrap">
                    <h3 style="display: inline-block;">YOUR BAG</h3>
                    <hr>
                    <div class="itemms">
                        <table class="itemm">

                            <?php foreach ($item as $k => $i) {
                                $counter++; ?>
                                <tr>
                                    <td class="wide">
                                        <a href="deletecart.php?id=<?php echo $k ?>" class="close" id="close"> &#10005;</a>
                                    </td>
                                    <td width="22%"><img src="<?php echo $i['img']; ?>" /></td>
                                    <td style="vertical-align: top;">
                                        <h4> <?php echo $i['name']; ?> </h4>

                                    </td>
                                    <td></td>
                                    <td></td>

                                    <td><span class="price"><?php echo $i['price']; ?></span>$</td>

                                </tr>
                            <?php
                                $prices += $i['price'];
                            } ?>

                        </table>
                        <button class="bot" style="width: 250px;">Check Out</button>
                    </div>
                </div>
                <?php

                $tax = $prices * 0.15;
                $shipping = 10;
                if ($prices + $tax > 150) {
                    $shipping = 0;
                } elseif ($counter == 0) {
                    $shipping = 0;
                }
                $tot = $prices + $tax + $shipping;

                ?>

                <div class="sidebar">
                    <button class="bot">Check Out</button>
                    <h3>ORDER SUMMERY: </h3>
                    <table class="side">
                        <tr>
                            <td><?php echo $counter ?> Products </td>
                        </tr>
                        <tr>
                            <td style="width: 100%">Total products</td>
                            <td><?php echo $prices; ?>$</td>
                        </tr>
                        <tr>
                            <td>Shipping</td>
                            <td><?php echo $shipping; ?>$</td>
                        </tr>
                        <tr>
                            <td>Tax</td>
                            <td><?php echo $tax; ?>$</td>
                        </tr>
                        <tr>
                            <td>Total </td>
                            <td><?php echo $tot; ?>$</td>
                        </tr>

                    </table>
                </div>
            <?php } else {
                echo '<h1> Your cart is empty! :(</h1><br><br><br><br><br><br><br><br>';
            } ?></div>
    </div>
</body>

</html>
<?php
include('footer.php');
?>