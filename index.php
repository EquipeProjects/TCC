<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easyfit</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsivo.css">
    <link rel="shortcut icon" href="ico/logo.ico" type="image/x-icon">
    <meta name="author" content="João Victor,Davi Ribeiro e Yzabella Luiza">
    <meta name="keywords" content="HTML,CSS,JavaScript">
    <meta name="description"
        content="Um web site de vendas de roupas sob medida que adequa qualquer corpo,gosto e estilo.">
</head>

<body>
    <?php
    include('php/header.php'); // Inclui o cabeçalho
    ?>

    <header>
        <div class="logo">
            <a href="#">
                <img src="img/logo.png" alt="Your Logo">
            </a>
        </div>

        <div class="center-links">
            <ul>
                <li><a href="#">HOME</a></li>
                <li><a href="#">NOVIDADES</a></li>
                <li class="teste"><a href="">CATÁLOGO</a>
                    <div class="dropdown-catalog" style="z-index: 5;">
                        <div class="drop_heads">
                            <a href='catalogo.php?categoria=1'>

                                <div class="text_catalog"><b>MASCULINO</b></div>
                            </a>

                            <a href='catalogo.php?categoria=1&sub=blusas'>
                                <div>BLUSAS</div>
                            </a>
                            <a href="catalogo.php?categoria=1&sub=CAMISETAS / REGATAS">
                                <div>CAMISETAS / REGATAS </div>
                            </a>
                            <a href="catalogo.php?categoria=1&sub=MOLETONS">
                                <div>MOLETONS</div>
                            </a>
                            <a href="catalogo.php?categoria=1&sub=CALÇAS">
                                <div>CALÇAS</div>
                            </a>
                            <a href="catalogo.php?categoria=1&sub=JEANS">
                                <div>JEANS</div>
                            </a>
                            <a href="catalogo.php?categoria=1&sub=JAQUETAS">
                                <div>JAQUETAS</div>
                            </a>
                        </div>
                        <div class="drop_heads">
                            <a href='catalogo.php?categoria=2'>
                                <div class="text_catalog"><b>UNISSEX</b></div>
                            </a>
                            <a href="catalogo.php?categoria=2&sub=blusas">
                                <div>BLUSAS</div>
                            </a>
                            <a href="catalogo.php?categoria=2&sub=CAMISETAS / REGATAS">
                                <div>CAMISETAS / REGATAS</div>
                            </a>
                            <a href="catalogo.php?categoria=2&sub=CAMISETAS DE TIME">
                                <div>CAMISETAS DE TIME</div>
                            </a>
                            <a href="catalogo.php?categoria=2&sub=MOLETONS">
                                <div>MOLETONS</div>
                            </a>
                            <a href="catalogo.php?categoria=2&sub=CALÇAS">
                                <div>CALÇAS</div>
                            </a>
                            <a href="catalogo.php?categoria=2&sub=JEANS">
                                <div>JEANS</div>
                            </a>
                        </div>
                        <div class="drop_heads">
                            <a href='catalogo.php?categoria=3'>
                                <div class="text_catalog"><b>FEMININO</b></div>
                                <a href="catalogo.php?categoria=3&sub=CAMISETAS / REGATAS">
                                    <div>BLUSAS</div>
                                </a>
                                <a>
                                    <div>CAMISETAS / REGATAS </div>
                                </a>
                            </a>
                            <a href="catalogo.php?categoria=3&sub=TOPS / CROPPEDS">
                                <div>TOPS / CROPPEDS</div>
                            </a>
                            <a href="catalogo.php?categoria=3&sub=MOLETONS">
                                <div>MOLETONS</div>
                            </a>
                            <a href="catalogo.php?categoria=3&sub=CALÇAS">
                                <div>CALÇAS</div>
                            </a>
                            <a href="catalogo.php?categoria=3&sub=JEANS">
                                <div>JEANS</div>
                            </a>
                            <a href="catalogo.php?categoria=3&sub=SAIAS / VESTIDOS">
                                <div>SAIAS / VESTIDOS</div>
                            </a>
                            <a href="catalogo.php?categoria=3&sub=JAQUETAS">
                                <div>JAQUETAS</div>
                            </a>
                        </div>
                        <div class="drop_heads">
                            <a href='catalogo.php?categoria=4'>

                                <div class="text_catalog"><b>CALÇADOS</b></div>
                            </a>

                            <a href="catalogo.php?categoria=4&sub=MASCULINOS">
                                <div> MASCULINOS</div>
                            </a>
                            <a href="catalogo.php?categoria=4&sub=FEMININOS">
                                <div> FEMININOS</div>
                            </a>
                            <a href="catalogo.php?categoria=4&sub=INFANTIL">
                                <div> INFANTIL</div>
                            </a>
                        </div>
                    </div>
                </li>
                <li><a href="#">AJUDA</a></li>
            </ul>
        </div>

        <form class="pesquisar" action="pesquisar.php">
            <input name="termo_pesquisa" placeholder="BUSCAR" type="text">
            <button type="submit">
                <img width="30px" src="img/loupe.png" alt="Search Icon">
            </button>
        </form>

        <div class="icons">
            <a href="#">
                <img src="img/bag.png" alt="Shopping Bag Icon">
            </a>
            <div class="dropdown_user">
                <a class="" href="#">
                    <img src="img/user.png" alt="User Icon">

                    <div class="dropdown-child">
                        <a href="login.php"><button class="button_entrar"><b>ENTRAR</b></button></a>
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
                </a>
            </div>
        </div>
       
        
    </header>



    <main>



        <div class="frasemotivac_text">“A moda deve ser uma forma de escapismo e não uma forma de prisão.”</div>
        <div class="Author_frase">“- Alexander McQueen”</div>
        <div class="caixa">


            <img class="img_nanismo" src='img/nanismo.jpg'>
            <img class="img_mulher_poderosa" src='img/mulher_poderosa.jpg'>
            <img class="img_mulheres" src='img/mulheres.jpg'>
            <div style="display: flex; width: 40%;position: absolute; left: 30%;bottom: 0; height: 40%;">
                <div class="medidas">
                    <div class="tod_medidas1">PARA TODOS OS ESTILOS</div>
                    <div class="tod_medidas2">PARA TODAS AS MEDIDAS</div>


                </div>

                <div class="download_blackground"></div>
                <img class="download_img" src="img/button_download.png">
            </div>


        </div>



        <div class="carousel">
            <div class="carousel-images">
                <img src="img/s1.png" alt="Imagem 1">
                <img src="img/girl.jpg" alt="Imagem 2">
                <img src="img/menina.jpg" alt="Imagem 3">
                <!-- Adicione mais imagens conforme necessário -->
            </div>

            <a class="carousel-prev"><img src="img/seta.png" alt=""></a>
            <a class="carousel-next"><img src="img/seta.png" alt=""></a>

            <div class="carousel-dots">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <!-- Adicione mais bolinhas conforme necessário -->
            </div>
        </div>
        <div class="background_carrosel">Estilos em Alta</div>
    </main>

    <section>
        <div class="image-container">
            <div class="center-img">
                <button class="overlay-button">
                    <p> MOLETOM LARANJA <br> exterior mais vendido </p>
                    <img src="img/seta.png" alt="">
                </button>
            </div>
        </div>
        <div class="top-right-image">

            <span class="image-text"> BLACK METAL</span>
        </div>
        <div class="text-left">
            <h2>NOVAS <br><span style="font-style: italic; margin-left: 5%;">COLEÇÕES</span>
            </h2>
        </div>

        <button class="bottom-left-button">COMPRE AGORA</button>
        <button class="bottom-right-button">Proximo slide</button>

    </section>
    <footer>
        <div class="footer_item">
            <div class="">ENCONTRE UMA LOJA EASY FIT</div>
            <div>FORMAS DE PAGAMENTO</div>
            <div class="flex_pag">
                <img class="footer_pag" src="img/mastercard.svg">
                <img class="footer_pag" src="img/hipercard.svg">
            </div>
            <img class="footer_pag" src="img/visa.svg">
            <img class="footer_pag" src="img/elo.svg">
            <img class="footer_pag" src="img/amex.svg">
        </div>
        <div class="footer_item">
            <div class="">REDES SOCIAIS
                <div>
                    <img class="footer_rede" src="img/instagram.png">
                    <img class="footer_rede" src="img/facebbok.png">
                    <img class="footer_rede" src="img/youtube.png">
                </div>
            </div>
        </div>
        
     
        <div class="footer_item">
            <a class="link_sobrenos" href="sobrenos.html">
                <div>SOBRE A EASY FIT</div>
            </a>
            <div class="footer_text">SUSTENTABILIDADE</div>
        </div>
        <div class="footer_item">AJUDA
            <div class="footer_text">DÚVIDAS GERAIS</div>
            <div class="footer_text">TROCAS E DEVOLUÇÕES </div>
            <div class="footer_text">PAGAMENTOS</div>
            <div class="footer_text">FALE CONOSCO </div>
        </div>
       
       
        <div class="grid-item">
            <div>© 2023 EASY FIT. Visa um Comércio de Produtos gerais da moda Ltda - Todos os direitos reservados.
            </div>
        </div>
        <div class="grid-item">POLÍTICA DE PRIVACIDADE</div>
        <div class="grid-item">BRASIL</div>

    </footer>
    <script src="js/index.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const hamburgerMenu = document.querySelector('.hamburger-menu');
            const centerLinks = document.querySelector('.center-links ul');
    
            hamburgerMenu.addEventListener('click', function () {
                centerLinks.classList.toggle('active');
            });
        });
    </script>
</body>



</html>