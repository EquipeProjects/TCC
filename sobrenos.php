<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/sobrenos.css">
    <title>Sobre Nós</title>
</head>

<body>
    <header>
    <?php
    include('php/header.php'); // Inclui o cabeçalho
    ?>

</header>
<main>
    <div class="menu_nos"><div>Sobre nós</div>
    <div class="text_nos"> A nossa empresa surgiu na necessidade que observamos no mercado sobre a inclusão no setor da moda. A EasyFit, portanto, é adequada à pessoas que enfrentam dificuldades para encontrar roupas nas medidas apropriadas do corpo, como por exemplo: pessoas com nanismo, plus sizes ou com estatura fora do comum. Nossa empresa busca trazer fácil acesso, conforto e segurança aos clientes. 
        Vale ressaltar que somos contribuintes para a área comercial, oferecendo oportunidade a empreendedores na área de confecção de roupas.
        Contudo, a EasyFit garante inclusão, segurança e confiabilidade.</div></div>
</main>
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