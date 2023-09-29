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
<body>
    <h1>Bem-vindo à página do vendedor! </h1>
    
    <a href="cadastro.php">cadastro produto</a>
    <a href="visualizar_produtos.php">visualizar produtos</a>
    <!-- Conteúdo da página exclusiva do vendedor -->
</body>
</html>
