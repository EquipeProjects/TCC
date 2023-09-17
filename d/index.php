<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com
*/
session_start();
include('db.php');
$status="";
if (isset($_POST['id']) && $_POST['id']!=""){
$id = $_POST['id'];
$result = mysqli_query($con,"SELECT * FROM `produtos` WHERE `id`='$id'");
$row = mysqli_fetch_assoc($result);
$nome = $row['nome'];
$id = $row['id'];
$valor = $row['valor'];
$image = $row['imagem'];

$cartArray = array(
	$id=>array(
	'nome'=>$nome,
	'id'=>$id,
	'valor'=>$valor,
	'quantity'=>1,
	'imagem'=>$image)
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	$status = "<div class='box'>Product is added to your cart!</div>";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($id,$array_keys)) {
		$status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
}
?>
<html>
<head>
<title>Demo Simple Shopping Cart using PHP and MySQL - AllPHPTricks.com</title>
<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
</head>
<body>
<div style="width:700px; margin:50 auto;">

<h2>Demo Simple Shopping Cart using PHP and MySQL</h2>   

<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="cart.php"><img src="cart-icon.png" /> Cart<span><?php echo $cart_count; ?></span></a>
</div>
<?php
}

$result = mysqli_query($conn,"SELECT * FROM `produtos`");
while($row = mysqli_fetch_assoc($result)){
		echo "<div class='product_wrapper'>
			  <form method='post' action=''>
			  <input type='hidden' nome='id' value=".$row['id']." />
			  <div class='image' '><img  style=' width: 200px;
			  height: 200px;' src='../admin/".$row['imagem']."' /></div>
			  <div class='nome'>".$row['nome']."</div>
		   	  <div class='pric e'>$".$row['valor']."</div>
			  <button type='submit' class='buy'>Buy Now</button>
			  </form>
		   	  </div>";
        }
mysqli_close($conn);
?>

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