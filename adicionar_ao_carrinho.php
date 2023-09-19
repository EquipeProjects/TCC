<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "meubanco"; // Nome do seu banco de dados
$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
    die("Erro na conexão com o banco de dados: " . $con->connect_error);
}

session_start();

// Conexão com o banco de dados (substitua pelas suas informações)

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
header("Location: produto.php?id=$code");
exit();
?>