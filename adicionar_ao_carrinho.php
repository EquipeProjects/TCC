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
        $altura = isset($_POST['altura_personalizada']) ? $_POST['altura_personalizada'] : "";
        $largura = isset($_POST['largura_personalizada']) ? $_POST['largura_personalizada'] : "";
        $comprimento = isset($_POST['comprimento_personalizado']) ? $_POST['comprimento_personalizado'] : "";
        $result = mysqli_query($con, "SELECT * FROM `produtos` WHERE `id`='$code'");
        $row = mysqli_fetch_assoc($result);
        $name = $row['nome'];
        $code = $row['id'];
        $price = $row['valor'];
        $image = $row['imagem'];
        $tamanho = ($altura != "" || $largura != "" || $comprimento != "") ? "Personalizado (Altura: $altura, Largura: $largura, Comprimento: $comprimento)" : "A";

        $cartArray = array(
            'name' => $name,
            'code' => $code,
            'price' => $price,
            'quantity' => 1,
            'image' => $image,
            'tamanho' => $tamanho
        );

    if (empty($_SESSION["shopping_cart"])) {
        $_SESSION["shopping_cart"] = array($code => $cartArray);
        $status = "<div class='box'>Produto adicionado ao seu carrinho!</div>";
    } else {
        if (array_key_exists($code, $_SESSION["shopping_cart"])) {
            $status = "<div class='box' style='color:red;'>Produto já foi adicionado ao seu carrinho!</div>";
        } else {
            $_SESSION["shopping_cart"][$code] = $cartArray;
            $status = "<div class='box'>Produto adicionado ao seu carrinho!</div>";
        }
    }
}

header("Location: produto.php?id=$code");
exit();
?>
