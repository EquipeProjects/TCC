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
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Noto+Serif+Balinese&family=Noto+Serif+NP+Hmong&family=Playfair+Display&family=Roboto&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Noto+Serif+Balinese&family=Noto+Serif+NP+Hmong&family=Roboto&display=swap" rel="stylesheet">
    <meta name="author" content="João Victor,Davi Ribeiro e Yzabella Luiza">
    <meta name="keywords" content="HTML,CSS,JavaScript">
    <meta name="description"
        content="Um web site de vendas de roupas sob medida que adequa qualquer corpo,gosto e estilo.">
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



        <a href="carrosel.php"><div class="carousel">
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
        <div class="background_carrosel">Estilos em Alta</div></a>
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

    <?php 
    include('php/footer.php')
    ?>
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