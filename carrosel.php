<!-- estilos_em_alta.php -->

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estilos em Alta</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsivo.css">
    <link rel="shortcut icon" href="ico/logo.ico" type="image/x-icon">
    <meta name="author" content="João Victor,Davi Ribeiro e Yzabella Luiza">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="description" content="Veja os estilos em alta na Easyfit.">
</head>

<body>
    <?php
    include('php/header.php'); // Inclui o cabeçalho
    ?>

    <main>
        <h1 class="text_alta_titulo">Estilos em Alta</h1>

        <!-- Exemplo de produtos relacionados -->
        <div class="product">
        
            
            <img class="imgens_emalta1" src="img/street.jpg" alt="Produto 1">
            <h2 class="text_alta_titulo">Streetwear:</h2>
            <p class="text_estilo_exp">O streetwear é um estilo de moda urbano, casual e influenciado pela cultura das ruas. Caracterizado por peças confortáveis, logotipos marcantes e colaborações exclusivas, o streetwear combina elementos esportivos, de skate e hip-hop. Destaca-se pela mistura de alta e baixa moda, incorporando hoodies oversized, bonés de aba reta, tênis exclusivos e camisetas gráficas.</p>
            <button class="button_relacionado">Itens relacionados</button>
        </div>

        <div class="product">
          
            <img class="imgens_emalta2" src="img/rock.jpg" alt="Produto 2">
            <h2 class='text_alta_titulo'>Rock'n'Roll:</h2>
            <p class="text_estilo_exp">O estilo rock'n'roll na moda reflete rebeldia, atitude e individualidade, inspirado pela cultura musical do rock. Marcado por peças ousadas como jaquetas de couro, camisetas de bandas, jeans rasgados e botas de plataforma, o rock'n'roll fashion celebra a expressão pessoal e quebra de normas. Sua estética despojada e influência vintage continuam a impactar a moda de rua, destacando-se pela ousadia e rebeldia atemporais.





</p>
            <button class="button_relacionado">Itens relacionados</button>
        </div>

        <!-- Adicione mais produtos conforme necessário -->

    </main>

    <?php 
    include('php/footer.php');
    ?>

    <script src="js/index.js"></script>
</body>

</html>
