<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com
*/
session_start();
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
	foreach($_SESSION["shopping_cart"] as $key => $value) {
		if($_POST["id"] == $key){
		unset($_SESSION["shopping_cart"][$key]);
		$status = "<div class='box' style='color:red;'>
		produto is removed from your cart!</div>";
		}
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
			}		
		}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['id'] === $_POST["id"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the produto
    }
}
  	
}
?>
<html>
<head>
<title>Demo Shopping Cart - AllPHPTricks.com</title>
<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
</head>
<body>
<div style="width:700px; margin:50 auto;">

<h2>Demo Shopping Cart</h2>   

<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="cart.php">
<img src="cart-icon.png" /> Cart
<span><?php echo $cart_count; ?></span></a>
</div>
<?php
}
?>

<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_valor = 0;
?>	
<table class="table">
<tbody>
<tr>
<td></td>
<td>ITEM NAME</td>
<td>QUANTITY</td>
<td>UNIT valor</td>
<td>ITEMS TOTAL</td>
</tr>	
<?php		
foreach ($_SESSION["shopping_cart"] as $produto){
?>
<tr>
<td><img src='<?php echo $produto["imagem"]; ?>' width="50" height="40" /></td>
<td><?php echo $produto["nome"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='id' value="<?php echo $produto["id"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Remove Item</button>
</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='id' value="<?php echo $produto["id"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onchange="this.form.submit()">
<option <?php if($produto["quantity"]==1) echo "selected";?> value="1">1</option>
<option <?php if($produto["quantity"]==2) echo "selected";?> value="2">2</option>
<option <?php if($produto["quantity"]==3) echo "selected";?> value="3">3</option>
<option <?php if($produto["quantity"]==4) echo "selected";?> value="4">4</option>
<option <?php if($produto["quantity"]==5) echo "selected";?> value="5">5</option>
</select>
</form>
</td>
<td><?php echo "$".$produto["valor"]; ?></td>
<td><?php echo "$".$produto["valor"]*$produto["quantity"]; ?></td>
</tr>
<?php
$total_valor += ($produto["valor"]*$produto["quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "$".$total_valor; ?></strong>
</td>
</tr>
</tbody>
</table>		
  <?php
}else{
	echo "<h3>Your cart is empty!</h3>";
	}
?>
</div>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>


<br /><br />
<a href="https://www.allphptricks.com/simple-shopping-cart-using-php-and-mysql/"><strong>Tutorial Link</strong></a> <br /><br />
For More Web Development Tutorials Visit: <a href="https://www.allphptricks.com/"><strong>AllPHPTricks.com</strong></a>
</div>
</body>
</html>