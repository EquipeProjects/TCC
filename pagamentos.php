<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamentos</title>
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
            <div class="title_ajuda">Pagamentos </div>

            <div class="backgroun_privacidade">
         Na EasyFit, sua experiência de compra é descomplicada e segura. Nesta página, você encontrará informações sobre as opções de pagamento para clientes, dicas de segurança e como aproveitar ao máximo as compras na EasyFit, sua loja de roupas favorita.

         <div>Opções de Pagamento para Clientes
Oferecemos diversas opções de pagamento para garantir que sua compra seja prática e flexível:</div>

<div> Cartões de Crédito e Débito: Aceitamos uma variedade de cartões para facilitar seu pagamento.  </div> 

<div>Pagamento Online: Utilize métodos de pagamento online, como carteiras digitais e serviços de pagamento móvel.</div> 

<div>Outras Formas de Pagamento: Verifique as opções adicionais de pagamento disponíveis no checkout.</div> 

Como Fazer Compras na EasyFit
Comprar na EasyFit é simples e agradável:

Cadastro: Crie uma conta EasyFit para iniciar suas compras.

Navegue pelo Catálogo: Explore nossa ampla seleção de roupas, acessórios e muito mais.

Adicione ao Carrinho: Encontre os itens que você ama e adicione-os ao seu carrinho de compras.

Pagamento Fácil: Escolha o método de pagamento que preferir e conclua sua compra.

Desfrute das Suas Compras: Aguarde a entrega dos seus produtos e desfrute do que a EasyFit tem a oferecer.

Dicas de Segurança nas Transações
Sua segurança é uma prioridade para nós. Implementamos medidas rigorosas para proteger suas informações pessoais e financeiras. Utilizamos tecnologia de criptografia avançada para garantir que seus dados estejam seguros e protegidos contra fraudes.

Conclusão
Na EasyFit, estamos comprometidos em tornar sua experiência de compra tranquila e segura. Com opções de pagamento flexíveis e uma ampla seleção de produtos, estamos aqui para ajudá-lo a encontrar as roupas perfeitas e acessórios para o seu estilo.
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