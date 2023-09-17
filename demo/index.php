<?php
session_start();

// Conexão com o banco de dados (substitua pelas suas informações)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "meubanco"; // Nome do seu banco de dados
$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
    die("Erro na conexão com o banco de dados: " . $con->connect_error);
}

$status = "";

if (isset($_POST['code']) && $_POST['code'] != "") {
    $code = $_POST['code'];
    $result = mysqli_query($con, "SELECT * FROM `produtos` WHERE `id`='$code'");
    $row = mysqli_fetch_assoc($result);
    $name = $row['nome'];
    $code = $row['id'];
    $price = $row['valor'];
    $image = $row['imagem'];

    $cartArray = array(
        $code => array(
            'name' => $name,
            'code' => $code,
            'price' => $price,
            'quantity' => 1,
            'image' => $image
        )
    );

    if (empty($_SESSION["shopping_cart"])) {
        $_SESSION["shopping_cart"] = $cartArray;
        $status = "<div class='box'>Produto adicionado ao seu carrinho!</div>";
    } else {
        $array_keys = array_keys($_SESSION["shopping_cart"]);
        if (in_array($code, $array_keys)) {
            $status = "<div class='box' style='color:red;'>Produto já foi adicionado ao seu carrinho!</div>";
        } else {
            $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"], $cartArray);
            $status = "<div class='box'>Produto adicionado ao seu carrinho!</div>";
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
        if (!empty($_SESSION["shopping_cart"])) {
            $cart_count = count(array_keys($_SESSION["shopping_cart"]));
        ?>
            <div class="cart_div">
                <a href="cart.php"><img src="cart-icon.png" /> Carrinho<span><?php echo $cart_count; ?></span></a>
            </div>
        <?php
        }

        $result = mysqli_query($con, "SELECT * FROM `produtos`");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='product_wrapper'>
                  <form method='post' action=''>
                  <input type='hidden' name='code' value=" . $row['id'] . " />
                  <div class='image'><img src='../admin/" . $row['imagem'] . "' /></div>
                  <div class='name'>" . $row['nome'] . "</div>
               	  <div class='price'>$" . $row['valor'] . "</div>
                  <button type='submit' class='buy'>Comprar Agora</button>
                  </form>
               	  </div>";
        }
        mysqli_close($con);
        ?>

        <div style="clear:both;"></div>

        <div class="message_box" style="margin:10px 0px;">
            <?php echo $status; ?>
        </div>

        <br /><br />
        <a href="https://www.allphptricks.com/simple-shopping-cart-using-php-and-mysql/"><strong>Link do Tutorial</strong></a> <br /><br />
        Para Mais Tutoriais de Desenvolvimento Web, Visite: <a href="https://www.allphptricks.com/"><strong>AllPHPTricks.com</strong></a>
    </div>
</body>

</html>
