<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sustentabilidade</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/ajuda.css">
    <link rel="shortcut icon" href="/ico/logo.ico" type="image/x-icon">
    <meta name="author" content="João Victor,Davi Ribeiro e Yzabella Luiza">
    <meta name="keywords" content="HTML,CSS,JavaScript">
    <meta name="description" content="Um web site de vendas de roupas sob medida que adequa qualquer corpo,gosto e estilo.">
</head>

<body>
    <header>
        <?php
        include('php/header.php'); // Inclui o cabeçalho
        ?>



        </div>
    </header>

    <main>
        <div class="ajuda_menu">
            <div class="title_ajuda">SUSTENTABILIDADE </div>

            <div class="backgroun_sustent">
                A Easy Fit é uma loja de roupas que se destaca no mercado por oferecer produtos de alta tecnologia, combinando moda e funcionalidade. O que a torna ainda mais notável é o compromisso com a sustentabilidade em suas operações e produtos, garantindo que sua produção de roupas de alta tecnologia não prejudique o meio ambiente. A seguir, exploraremos como a Easy Fit incorpora a sustentabilidade em sua abordagem.

                Materiais Sustentáveis
                A Easy Fit é dedicada a utilizar materiais sustentáveis em sua linha de roupas de alta tecnologia. Isso inclui a preferência por tecidos orgânicos, como algodão orgânico e bambu, que são cultivados sem o uso de pesticidas tóxicos. Além disso, a empresa valoriza a reciclagem de materiais e busca ativamente opções de tecidos reciclados e inovadores, como poliéster reciclado a partir de garrafas plásticas.

                Processos de Fabricação Responsáveis
                Os processos de fabricação desempenham um papel fundamental na pegada ambiental da indústria da moda. A Easy Fit adota uma abordagem responsável em suas fábricas, garantindo práticas de produção mais sustentáveis. Isso inclui a minimização de desperdícios e o uso de tecnologias de economia de energia em suas instalações. Além disso, a empresa promove a produção local sempre que possível para reduzir as emissões de carbono associadas ao transporte de mercadorias.

                Design Durável e Versátil
                A Easy Fit incentiva o design de roupas duráveis e versáteis, que resistem ao teste do tempo e não saem de moda rapidamente. Isso ajuda a reduzir o desperdício associado à obsolescência das roupas e promove a ideia de moda sustentável.

                Embalagens Eco-friendly
                A empresa também se preocupa com as embalagens de seus produtos. Ela opta por embalagens eco-friendly, como caixas de papel reciclado e materiais de embalagem biodegradáveis, reduzindo o impacto ambiental de seus produtos desde o momento da embalagem até a entrega ao consumidor.

                Transparência e Educação
                A Easy Fit promove a transparência em suas operações, fornecendo informações detalhadas sobre a origem de seus materiais, processos de fabricação e práticas de sustentabilidade em seu site e nas etiquetas de suas roupas. Além disso, a empresa investe na educação do consumidor, explicando os benefícios da moda sustentável e como as escolhas individuais podem fazer a diferença para o meio ambiente.

                Responsabilidade Social
                A sustentabilidade da Easy Fit não se limita apenas às práticas ambientais. A empresa também se envolve em ações de responsabilidade social, como garantir condições de trabalho justas em suas fábricas e apoiar comunidades locais por meio de programas de doações e ações sociais.
            </div>



    </main>
    <?php
    include('php/footer.php')
    ?>
    <script src="js/index.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hamburgerMenu = document.querySelector('.hamburger-menu');
            const centerLinks = document.querySelector('.center-links ul');

            hamburgerMenu.addEventListener('click', function() {
                centerLinks.classList.toggle('active');
            });
        });
    </script>

</body>

</html>