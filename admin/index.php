<?php
session_start();


if (!isset($_SESSION['tipo_usuario'])) {
    // Se não estiver autenticado, redirecione-o para a página de login
    header("Location: ../login.php");
    exit();
}
// Verificar se o usuário está autenticado e é um vendedor
if ($_SESSION['tipo_usuario'] !== 'vendedor') {
    // Se não for um vendedor, redirecione-o para outra página ou exiba uma mensagem de erro.
    echo "Acesso negado. Esta página é apenas para vendedores.";
    // Você também pode redirecioná-lo para uma página de erro ou login.
    // header("Location: pagina_de_erro.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Página do Vendedor</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body   >
    <h1 style="text-align: center;">Bem-vindo à página do vendedor! </h1>
    <div class="pag-links">
        <p>Cadastrar produto</p>
        <a href="cadastro.php" class="link-admin">
            <img class="expecimg_admin" src="../img/plus.svg" alt=""  class="img-admin"><br>
    </a>
    <p> Visualizar produtos</p>
    <a href="visualizar_produtos.php"  class="link-admin">
        <img class="" src="../img/visuali.svg" alt=""  class="img-admin"><br>
    </a>
    <p>Pedidos</p>
    <a href="pedidos.php"  class="link-admin">
            <img class="" src="../img/pen.svg" alt=""  class="img-admin"><br>   

        </a>
    </div>
  
</body>
</html>
