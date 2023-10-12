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
                    <img class="seta_pedido" src="/img/seta_black.png">
                </a>
                <a class="links_pedidos" href="#">
                    <div>Acessar ou estornar meus pedidos</div>
                    <img class="seta_pedido" src="/img/seta_black.png">
                </a>
                <a class="links_pedidos" href="#">
                    <div>Verificar status de pagamento</div>
                    <img class="seta_pedido" src="/img/seta_black.png">
                </a>
            </div>
            <div class="text_cancelamentos">
                <div>Troca e Cancelamento</div>
                <a class="links_cancelamento" href="#">
                    <div>Solicitar troca ou devolução</div>
                    <img class="seta_cancela" src="/img/seta_black.png">
                </a>
                <a class="links_cancelamento" href="#">
                    <div>Cancelar um pedido ou produto</div>
                    <img class="seta_cancela" src="/img/seta_black.png">
                </a>
            </div>
            <div class="text_cadastro">
                <div>Meu Cadastro</div>
                <a class="links_cadastro" href="#">
                    <div>Alterar meus dados</div>
                    <img class="seta_cadast" src="/img/seta_black.png">
                </a>
                <a class="links_cadastro" href="#">
                    <div>Alterar meu endereço</div>
                    <img class="seta_cadast" src="/img/seta_black.png">
                </a>
                <a class="links_cadastro" href="#">
                    <div>Alterar minha senha</div>
                    <img class="seta_cadast" src="/img/seta_black.png">
                </a>
            </div>
            <div class="text_duvidas">DÚVIDAS FREQUENTES</div>

            <a class="link_duvida" href="#">
                <div>TENHA ACESSO AO STATUS DO SEU PEDIDO ATRAVÉS DE SUA CONTA</div>
            </a>
            <a class="link_duvida" href="#">
                <div> CONHEÇA NOSSA POLÍTICA, TIPOS E PRAZOS DE ENTREGA E FRETE</div>
            </a>
            <a class="link_duvida" href="#"> 
                <div>SAIBA COMO TROCAR OU DEVOLVER UM PRODUTO E TODAS AS CONDIÇÕES</div>
            </a>
            <a class="link_duvida" href="#">
                <div>SAIBA QUAIS MEIOS DE PAGAMENTO SÃO ACEITOS E TODAS AS CONDIÇÕES</div>
            </a>
            <a class="link_duvida" href="#">
                <div>INFORMAÇÃO DE COMO UTILIZAR VOUCHER DE DESCONTO</div>
            </a>
            <div class="title_contato">Entre em contato</div>
            <div class="title_email">E-MAIL</div>
            <img class="img_email" src="/img/email.png">
            <div class="title_fone">TELEFONE</div>
            <img class="img_fone" src="/img/telefone.png">
            <div class="text_email">EasyFiTcorporation@gmail.com</div>
            <div class="text_fone">(12)9005-8876</div>
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
            <div class="grid-item">SOBRE A EASY FIT
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