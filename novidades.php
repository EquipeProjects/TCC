<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/novidades.css">
    <title>Novidades</title>
</head>

<body>
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
            <a class="link_ajuda" href="ajuda.html">AJUDA</a>
        </nav>
        <input type="text" placeholder="BUSCAR">
        <a href="carrinho.html"><img class="button_shop" src='img/bag.png'></a>
        <a href="#"><img class="button_loupe" src='img/loupe.png'></a>

        <div class="dropdown">
            <img class="button_user" src='img/user.png'>
            <div class="dropdown-child">
                <a href="login.html"><button class="button_entrar"><b>ENTRAR</b></button></a>
                <img class="button_trian" src="/img/triangulo_drop.png">
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
    <main>


        <div class="flex_novid">
            <div class="menu_novid">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "meubanco";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Erro na conexão com o banco de dados: " . $conn->connect_error);
            }

            // ID da categoria correspondente a esta página (modificar conforme necessário)

            // Consulta SQL para selecionar produtos da categoria correspondente
            $sql = "SELECT id, nome, valor, imagem FROM produtos";
            $result = $conn->query($sql);


            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "
                
            <div class='product_space'>
                <div class='product_box'> <img class='img_novidade' src='admin/{$row['imagem']}' alt='{$row['nome']}'>
                    <div class='preco_product'>{$row['valor']}</div>
                </div>
                <div class='text_product'>{$row['nome']}</div>
                <div class='sob_categoria'>Casual</div>
            </div>

         
              
          ";
                }
            } else {
                echo "Nenhum produto nesta categoria.";
            }



            ?>


                <div class="product_space">
                    <div class="product_box"><img class="img_novidade" src="img/gola_alta.jpg">
                        <div class="preco_product">R$ 39,00</div>
                    </div>
                    <div class="text_product">Camisa gola alta preta</div>
                    <div class="sob_categoria">Casual</div>
                </div>
                <div class="product_space">
                    <div class="product_box"><img class="img_novidade" src="img/short.jpg">
                        <div class="preco_product">R$ 39,00</div>
                    </div>
                    <div class="text_product">short vermelho Easy Fit</div>
                    <div class="sob_categoria">Casual</div>

                </div>
                <div class="product_space">
                    <div class="product_box"><img class="img_novidade" src="/img/calça_beje.png">
                        <div class="preco_product">R$ 39,00</div>
                    </div>
                    <div class="text_product">Calça bege Easy Fit</div>
                    <div class="sob_categoria">Casual</div>

                </div>
                <div class="product_space">
                    <div class="product_box"><img class="img_novidade" src="/img/camisa_branco.jpg">
                        <div class="preco_product">R$ 39,00</div>
                    </div>
                    <div class="text_product">Camisa nike branca</div>
                    <div class="sob_categoria">Casual</div>
                </div>
                <div class="product_space">
                    <div class="product_box"><img class="img_novidade" src="/img/tenis.png">
                        <div class="preco_product">R$ 39,00</div>
                    </div>
                    <div class="text_product">tenis preto newshart</div>
                    <div class="sob_categoria">Casual</div>
                </div>
                <div class="product_space">
                    <div class="product_box"><img class="img_novidade" src="/img/calca.jpg">
                        <div class="preco_product">R$ 39,00</div>
                    </div>
                    <div class="text_product">Calça preta Easy Fit</div>
                    <div class="sob_categoria">Casual</div>
                </div>
                <div class="product_space">
                    <div class="product_box"><img class="img_novidade" src="/img/camisa_nike.jpg">
                        <div class="preco_product">R$ 39,00</div>
                    </div>
                    <div class="text_product">camisa preta nike</div>
                    <div class="sob_categoria">Casual</div>
                </div>

                <div class="product_space">
                    <div class="product_box"><img class="img_novidade" src="/img/camisa_branco.jpg">
                        <div class="preco_product">R$ 39,00</div>
                    </div>
                    <div class="text_product">Calça bege Easy Fit</div>
                    <div class="sob_categoria">Casual</div>
                </div>

                <div class="product_space">
                    <div class="product_box"><img class="img_novidade" src="/img/camisa_italia.jpg">
                        <div class="preco_product">R$ 39,00</div>
                    </div>
                    <div class="text_product">Camisa nike branca</div>
                    <div class="sob_categoria">Casual</div>
                </div>
                <div class="product_space">
                    <div class="product_box"><img class="img_novidade" src="/img/tenis.png">
                        <div class="preco_product">R$ 39,00</div>
                    </div>
                    <div class="text_product">Camisa nike branca</div>
                    <div class="sob_categoria">Casual</div>
                </div>

                <div class="product_space">
                    <div class="product_box"><img class="img_novidade" src="/img/gola_alta.jpg">
                        <div class="preco_product">R$ 39,00</div>
                    </div>
                    <div class="text_product">tenis preto newshart</div>
                    <div class="sob_categoria">Casual</div>
                </div>

                <div class="product_space">
                    <div class="product_box"><img class="img_novidade" src="/img/gola_alta.jpg">
                        <div class="preco_product">R$ 39,00</div>
                    </div>
                    <div class="text_product">tenis preto newshart</div>
                    <div class="sob_categoria">Casual</div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </main>

    <footer>
        <div class="grid-container">
            <div class="grid-item">ENCONTRE UMA LOJA EASY FIT</div>
            <div class="grid-item">REDES SOCIAIS
                <div>
                    <img class="footer_rede" src="/img/instagram.png">
                    <img class="footer_rede" src="/img/facebbok.png">
                    <img class="footer_rede" src="/img/youtube.png">
                </div>
            </div>
            <div class="grid-item">
                <a class="link_sobrenos" href="sobrenos.html">
                    <div>SOBRE A EASY FIT</div>
                </a>
                <div class="footer_text">SUSTENTABILIDADE</div>
            </div>
            <div class="grid-item">AJUDA
                <div class="footer_text">DÚVIDAS GERAIS</div>
                <div class="footer_text">TROCAS E DEVOLUÇÕES </div>
                <div class="footer_text">PAGAMENTOS</div>
                <div class="footer_text">FALE CONOSCO </div>
            </div>
            <div class="grid-item">
                <div>FORMAS DE PAGAMENTO</div>
                <div class="flex_pag">
                    <img class="footer_pag" src="/img/mastercard.svg">
                    <img class="footer_pag" src="/img/hipercard.svg">
                </div>
                <img class="footer_pag" src="/img/visa.svg">
                <img class="footer_pag" src="/img/elo.svg">
                <img class="footer_pag" src="/img/amex.svg">
            </div>
            <div class="grid-item"></div>
            <div class="grid-item">
                <div>© 2023 EASY FIT. Visa um Comércio de Produtos gerais da moda Ltda - Todos os direitos reservados.
                </div>
            </div>
            <div class="grid-item">POLÍTICA DE PRIVACIDADE</div>
            <div class="grid-item">BRASIL</div>
        </div>
    </footer>
</body>

</html>