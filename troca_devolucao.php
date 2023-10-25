<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easyfit</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/ajuda.css">
    <link rel="shortcut icon" href="/ico/logo.ico" type="image/x-icon">
    <meta name="author" content="João Victor,Davi Ribeiro e Yzabella Luiza">
    <meta name="keywords" content="HTML,CSS,JavaScript">
    <meta name="description"
        content="Um web site de vendas de roupas sob medida que adequa qualquer corpo,gosto e estilo.">
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
            <div class="title_ajuda">Central de Ajuda</div>
            <div class="text_pedidos">
                <div>Meus pedidos</div>
                <a class="links_pedidos" href="#">
                    <div>Acompanhar meus pedidos</div>
                    <img class="seta_pedido" src="img/seta_black.png">
                </a>
                <a class="links_pedidos" href="#">
                    <div>Acessar ou estornar meus pedidos</div>
                    <img class="seta_pedido" src="img/seta_black.png">
                </a>
                <a class="links_pedidos" href="#">
                    <div>Verificar status de pagamento</div>
                    <img class="seta_pedido" src="img/seta_black.png">
                </a>
            </div>
            <div class="text_cancelamentos">
                <div>Troca e Cancelamento</div>
                <a class="links_cancelamento" href="#">
                    <div>Solicitar troca ou devolução</div>
                    <img class="seta_cancela" src="img/seta_black.png">
                </a>
                <a class="links_cancelamento" href="#">
                    <div>Cancelar um pedido ou produto</div>
                    <img class="seta_cancela" src="img/seta_black.png">
                </a>
            </div>
            <div class="text_cadastro">
                <div>Meu Cadastro</div>
                <a class="links_cadastro" href="#">
                    <div>Alterar meus dados</div>
                    <img class="seta_cadast" src="img/seta_black.png">
                </a>
                <a class="links_cadastro" href="#">
                    <div>Alterar meu endereço</div>
                    <img class="seta_cadast" src="img/seta_black.png">
                </a>
                <a class="links_cadastro" href="#">
                    <div>Alterar minha senha</div>
                    <img class="seta_cadast" src="img/seta_black.png">
                </a>
            </div>
            <div class="text_duvidas">ARTIGOS SOBRE DEVOLUÇÕES</div>

            <a class="link_duvida" href="#">
                <div>Como trocar um produto adquirido em Loja Física?</div>
            </a>
            <a class="link_duvida" href="#">
                <div>Política de devolução para compras no site</div>
            </a>
            <a class="link_duvida" href="#"> 
                <div>Restituição de valores</div>
            </a>
            <a class="link_duvida" href="#">
                <div>Como preparar um produto para devolução</div>
            </a>
            <a class="link_duvida" href="#">
                <div>INFORMAÇÃO DE COMO UTILIZAR VOUCHER DE DESCONTO</div>
            </a>
            <div class="title_contato">Entre em contato</div>
            <div class="title_email">E-MAIL</div>
            <img class="img_email" src="img/email.png">
            <div class="title_fone">TELEFONE</div>
            <img class="img_fone" src="img/telefone.png">
            <div class="text_email">EasyFiTcorporation@gmail.com</div>
            <div class="text_fone">(12)9005-8876</div>
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