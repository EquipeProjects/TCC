<?php
session_start();
$status = "";

if (isset($_POST['action']) && $_POST['action'] == "remove") {
    if (!empty($_SESSION["shopping_cart"])) {
        foreach ($_SESSION["shopping_cart"] as $key => $value) {
            if ($_POST["code"] == $value['code']) {
                unset($_SESSION["shopping_cart"][$key]);
                $status = "<div class='box' style='color:red;'>Produto removido do carrinho!</div>";
            }
            if (empty($_SESSION["shopping_cart"])) {
                unset($_SESSION["shopping_cart"]);
            }
        }
    }
}

if (isset($_POST['action']) && $_POST['action'] == "change") {
    foreach ($_SESSION["shopping_cart"] as &$value) {
        if ($value['code'] === $_POST["code"]) {
            $value['quantity'] = $_POST["quantity"];
            break; // Pare o loop depois de encontrar o produto
        }
    }
}

$total_price = 0;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easyfit</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="/ico/logo.ico" type="image/x-icon">
    <meta name="author" content="João Victor,Davi Ribeiro e Yzabella Luiza">
    <meta name="keywords" content="HTML,CSS,JavaScript">
    <meta name="description" content="Um web site de vendas de roupas sob medida que adequa qualquer corpo,gosto e estilo.">
</head>

<body>
    <script defer src="js/index.js"></script>
    <header>
        <a href="index.html"><img class="logo" src="img/logo.png"></a>
        <nav class="link_menu">
            <a class="link_home" href="index.html">HOME</a>
            <a class="link_novid" href="/novidades.html">NOVIDADES</a>
            <div class="dropdown1">
                <a class="link_catalog" href="#">CATALOGO</a>
                <div class="dropdown-catalog">
                    <a href="#">
                        <div class="link_masc">
                            <div class="text_catalog"><b>MASCULINO</b></div>
                    </a>
                    <a href="#">
                        <div>BLUSAS</div>
                    </a>
                    <a href="#">
                        <div>CAMISETAS / REGATAS </div>
                    </a>
                    <a href="#">
                        <div>MOLETONS</div>
                    </a>
                    <a href="#">
                        <div>CALÇAS</div>
                    </a>
                    <a href="#">
                        <div>JEANS</div>
                    </a>
                    <a href="#">
                        <div>JAQUETAS</div>
                    </a>
                </div>
                <div class="link_unissex">
                    <a href="#">
                        <div class="text_catalog"><b>UNISSEX</b></div>
                    </a>
                    <a href="#">
                        <div>BLUSAS</div>
                    </a>
                    <a href="#">
                        <div>CAMISETAS / REGATAS</div>
                    </a>
                    <a href="#">
                        <div>CAMISETAS DE TIME</div>
                    </a>
                    <a href="#">
                        <div>MOLETONS</div>
                    </a>
                    <a href="#">
                        <div>CALÇAS</div>
                    </a>
                    <a href="#">
                        <div>JEANS</div>
                    </a>
                </div>
                <div class="link_femin">
                    <a href="#">
                        <div class="text_catalog"><b>FEMININO</b></div>
                        <a href="#">
                            <div>BLUSAS</div>
                        </a>
                        <a>
                            <div>CAMISETAS / REGATAS </div>
                        </a>
                    </a>
                    <a href="#">
                        <div>TOPS / CROPPEDS</div>
                    </a>
                    <a href="#">
                        <div>MOLETONS</div>
                    </a>
                    <a href="#">
                        <div>CALÇAS</div>
                    </a>
                    <a href="#">
                        <div>JEANS</div>
                    </a>
                    <a href="#">
                        <div>SAIAS / VESTIDOS</div>
                    </a>
                    <a href="#">
                        <div>JAQUETAS</div>
                    </a>
                </div>
                <div class="link_calcado">
                    <a href="#">
                        <div class="text_catalog"><b>CALÇADOS</b></div>
                    </a>
                    <a href="#">
                        <div> MASCULINOS</div>
                    </a>
                    <a href="#">
                        <div> FEMININOS</div>
                    </a>
                    <a href="#">
                        <div> INFANTIL</div>
                    </a>
                </div>
            </div>
            </div>
            <a class="link_ajuda" href="#">AJUDA</a>
        </nav>
        <input type="text" placeholder="BUSCAR">
        <a href="carrinho.html"><img class="button_shop" src='img/bag.png'></a>
        <a href="#"><img class="button_loupe" src='img/loupe.png'></a>

        <div class="dropdown">
            <img class="button_user" src='img/user.png'>
            <div class="dropdown-child">
                <a href="login.html"><button class="button_entrar"><b>ENTRAR</b></button></a>
                <img class="button_trian" src="img/triangulo_drop.png">
                <a href="#">
                    <div class="link_masc_user"><b>MASCULINO</b></div>
                </a><img class="seta_user" src="img/seta-direita.png">
                <a href="#">
                    <div class="link_femin_user"><b>FEMININO</b></div>
                </a><img class="seta_user" src="img/seta-direita.png">
                <a href="#">
                    <div class="link_ofert_user"><b>Ofertas</b></div>
                </a><img class="seta_user" src="img/seta-direita.png">
            </div>
        </div>

    </header>


    <div class="carrinho">
        <?php
        if (!empty($_SESSION["shopping_cart"])) {
            $cart_count = count(array_keys($_SESSION["shopping_cart"]));
        }
        ?>
        <?php
        if (isset($_SESSION["shopping_cart"])) {
            $total_price = 0;


        ?>


            <h1>Seu carrinho <span><?php echo $cart_count; ?> itens</span></h1>
            <h2> <?php echo "$" . $total_price; ?></h2>


            <ul class="cart-items">
                <?php
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

                        <input type="radio"><img src="admin/<?php echo $product["image"]; ?>" class="item-img" alt="">

                        <div class="cart-content">

                            <p> <?php echo $product["name"]; ?></p>


                            <div style="display: flex; width: 100%;flex-direction: row;  justify-content: space-between; position: relative; top:15vh">
                                <a href="" style="display: flex; align-content: flex-start; text-decoration: none;  color: black;"><span class="item-price"><?php $total_price += ($product["price"] * $product["quantity"]);
                                                                                                                                                            echo "$" . $product["price"] * $product["quantity"]; ?></span></a>
                                <form action="" method="post">

                                    <input type="number" value="<?php echo $product["quantity"]; ?>" name='quantity' onchange="this.form.submit()">
                                </form>



                            </div>




                        </div>


                    </li>
            <?php
                }
            } else {
                echo "<h3>Your cart is empty!</h3>";
            }
            ?>




            </li>

            </ul>
    </div>
    <div id="bottom-a">
        <a href="" class="inp-bot"><input type="radio">selecionar tudo</a>
        <div> <span id="totalcust"> <?php echo "$" . $total_price; ?></span> <a href="finalizarcompra.html"><button class="btn-generic">Finalizar Compra</button></a></div>

    </div>





</body>

</html>