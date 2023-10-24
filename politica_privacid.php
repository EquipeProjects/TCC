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
            <div class="title_ajuda">Política de Privacidade </div>

            <div class="backgroun_privacidade">
                <div>Data de Entrada em Vigor: [29/02/23] </div><br>

                <div> A EasyFit, adiante referida como "nós", "nosso" ou "nossa", está comprometida em proteger a privacidade dos nossos clientes. Esta política de privacidade descreve como coletamos, usamos, compartilhamos e protegemos as informações pessoais que você fornece quando utiliza o nosso site de comércio eletrônico. </div>

                <div> 1. Informações Coletadas </div>

                <div> 1.1. Informações de Cadastro: Quando você cria uma conta em nosso site, coletamos informações pessoais, incluindo seu nome, endereço de e-mail, endereço de entrega e outras informações necessárias para processar o seu pedido e fornecer suporte ao cliente. </div>

                <div>1.2. Informações de Pagamento: Ao efetuar uma compra, coletamos informações de pagamento, como números de cartão de crédito ou débito, informações de faturamento e outros detalhes relevantes para processar transações. </div>

                <div>1.3. Informações de Navegação: Coletamos informações sobre como você utiliza o nosso site, incluindo o seu endereço IP, tipo de navegador, sistema operacional, páginas visitadas e datas e horários de acesso. </div>

                <div>2. Uso das Informações </div>

                <div> 2.1. Processamento de Pedidos: Utilizamos as informações pessoais fornecidas para processar os pedidos, entregar produtos e fornecer serviços de suporte ao cliente. </div>

                <div>2.2. Comunicações: Podemos usar seu endereço de e-mail para enviar informações sobre seus pedidos, promoções, atualizações e newsletters. Você pode optar por não receber comunicações de marketing a qualquer momento. </div>

                <div> 2.3. Melhoria do Site: As informações de navegação são utilizadas para melhorar a experiência do usuário, personalizar o conteúdo do site e analisar o desempenho do site. </div>

                <div> 3. Compartilhamento de Informações </div>

                <div> 3.1. Terceiros: Podemos compartilhar informações pessoais com terceiros que nos ajudam a fornecer serviços, como processamento de pagamentos, entrega de produtos e análise de dados. Esses terceiros têm políticas de privacidade próprias. </div>

                <div> 4. Segurança de Dados </div>

                <div>Implementamos medidas de segurança para proteger suas informações pessoais contra acesso não autorizado, uso indevido ou divulgação. </div>

                <div> 5. Seus Direitos </div>

                <div> Você tem o direito de acessar, corrigir ou excluir suas informações pessoais. Você também pode optar por não receber comunicações de marketing. Para exercer esses direitos ou para fazer perguntas sobre esta política de privacidade, entre em contato conosco através das informações de contato fornecidas no final deste documento. </div>

                <div>6. Alterações na Política de Privacidade </div>

                <div>Reservamo-nos o direito de atualizar esta política de privacidade conforme necessário. Quaisquer alterações serão publicadas em nosso site e entrarão em vigor na data da publicação. </div>

                <div>7. Contato </div>

                <div>Para entrar em contato conosco com perguntas ou preocupações sobre esta política de privacidade, envie um e-mail para [grupotcctec@gmail.com]. </div>

                <div>Esta política de privacidade destina-se a informá-lo sobre como tratamos suas informações pessoais. Ao utilizar nosso site, você concorda com as práticas descritas nesta política.</div>
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