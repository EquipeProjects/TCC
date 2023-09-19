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
    <meta name="description" content="Um web site de vendas de roupas sob medida que adequa qualquer corpo,gosto e estilo.">
</head>

<body>
    <?php
    include('php/header.php'); // Inclui o cabeçalho
    ?>
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
        <div class="grid-container">
            <div class="grid-item">ENCONTRE UMA LOJA EASY FIT</div>
            <div class="grid-item">REDES SOCIAIS
                <div>
                    <img class="footer_rede" src="img/instagram.png">
                    <img class="footer_rede" src="img/facebbok.png">
                    <img class="footer_rede" src="img/youtube.png">
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
                    <img class="footer_pag" src="img/mastercard.svg">
                    <img class="footer_pag" src="img/hipercard.svg">
                </div>
                <img class="footer_pag" src="img/visa.svg">
                <img class="footer_pag" src="img/elo.svg">
                <img class="footer_pag" src="img/amex.svg">
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
    <script src="js/index.js"></script>
</body>

</html>