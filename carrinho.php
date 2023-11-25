<?php
session_start();
$status = "";

if (isset($_GET['action']) && $_GET['action'] === "remove" && isset($_GET["code"])) {
    $code_to_remove = $_GET["code"];
    if (!empty($_SESSION["shopping_cart"])) {
        foreach ($_SESSION["shopping_cart"] as $key => $value) {
            if ($code_to_remove == $value['code']) {
                unset($_SESSION["shopping_cart"][$key]);
                $status = "<div class='box' style='color:red;'>Produto removido do carrinho!</div>";
            }
        }
    }
}


if (isset($_POST['quantity']) && isset($_POST['code'])) {
    $new_quantity = $_POST['quantity'];
    $code = $_POST['code'];
    
    if (!empty($_SESSION["shopping_cart"])) {
        foreach ($_SESSION["shopping_cart"] as &$product) {
            if ($product['code'] === $code) {
                $product['quantity'] = $new_quantity;
                break; // Stop the loop after finding the product
            }
        }
    }
}


$total_price = 0;
$cart_count = 0;

if (isset($_SESSION["shopping_cart"])) {
    foreach ($_SESSION["shopping_cart"] as $product) {
        $total_price += ($product["price"] * $product["quantity"]);
        $cart_count += $product["quantity"];
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="/ico/logo.ico" type="image/x-icon">
    <meta name="author" content="João Victor,Davi Ribeiro e Yzabella Luiza">
    <meta name="keywords" content="HTML,CSS,JavaScript">
    <meta name="description" content="Um web site de vendas de roupas sob medida que adequa qualquer corpo,gosto e estilo.">
</head>

<body>
    <script defer src="js/index.js"></script>

    <?php
    include('php/header.php'); // Inclui o cabeçalho
    ?>

    <div class="carrinho">
        <h1>Seu carrinho <span><?php echo $cart_count; ?> (itens)</span></h1>
        <h2><?php echo "R$" . $total_price; ?></h2>

        <ul class="cart-items">
            <?php
            if (!empty($_SESSION["shopping_cart"])) {
                foreach ($_SESSION["shopping_cart"] as $product) {
            ?>
                    <li class="item">

                        <div class="item-header">
                            <a href="" class="item-link"><img src="img/bag.png" alt="">
                                <div style="color:black; text-decoration: none; font-size: 4vh; text-transform: uppercase;">Loja 
                                    Easy fit</div> <img src="img/seta-direita.png" alt="">
                            </a>
                            <a href="" style=" display: flex; justify-content: flex-end;"><img src="/img/lixo.png" alt=""></a>



                        </div>

                        <input type="radio"><img src="admin/<?php echo $product["image"];  ?>" class="item-img" alt="">

                        <div class="cart-content">

                            <p> <?php echo htmlspecialchars($product["name"] . $product["tamanho"]); ?></p>




                            <div style="display: flex; width: 100%;flex-direction: row;  justify-content: space-between; position: relative; top:15vh">
                                <a href="" style="display: flex; align-content: flex-start; text-decoration: none;  color: black;"><span class="item-price"><?php ($product["price"] * $product["quantity"]);
                                                                                                                                                            echo "R$" . $product["price"] * $product["quantity"]; ?></span></a>
                                <form action="" method="post">
                                    <input type="number" value="<?php echo $product["quantity"]; ?>" name='quantity' onchange="updateQuantity(this)">
                                    <input type="hidden" name="code" value="<?php echo $product["code"]; ?>">
                                </form>
                                <a href="carrinho.php?action=remove&code=<?php echo $product["code"]; ?>" class="remove-item">Remover</a>




                            </div>




                        </div>


                    </li>
            <?php
                }
            } else {
                echo "<h3>Seu carrinho está vazio!</h3>";
            }
            ?>




            </li>

        </ul>
    </div>
    <div id="bottom-a">
        <a href="" class="inp-bot"><input type="radio">Selecionar Tudo</a>
        <div> <span id="totalcust"> <?php echo "R$" . $total_price; ?></span> <a href="php/checkout.php"><button class="btn-generic">Finalizar Compra</button></a></div>

    </div>





</body>

</html>