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

// Inclua a conexão com o banco de dados
include('conexao.php');

// Recupere o ID do vendedor da sessão
$vendedor_id = $_SESSION['id'];

// Consulta para obter informações do vendedor
$query_vendedor = "SELECT * FROM vendedores WHERE id = $vendedor_id";
$result_vendedor = $conn->query($query_vendedor);

// Verifica se encontrou o vendedor
if ($result_vendedor->num_rows > 0) {
    $dados_vendedor = $result_vendedor->fetch_assoc();
} else {
    // Lidere com o caso em que o vendedor não é encontrado
    echo "Vendedor não encontrado.";
    exit();
}

// Consulta para obter produtos do vendedor
$query_produtos = "SELECT * FROM produtos WHERE id = $vendedor_id";
$result_produtos = $conn->query($query_produtos);
if ($result_produtos === false) {
    die("Erro na consulta de produtos: " . $conn->error);
}
// Fechar a conexão após a consulta
$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Página do Vendedor</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <h1 style="text-align: center;">Bem-vindo à página do vendedor <?php echo $dados_vendedor['nome']; ?>!</h1>
    <div class="pag-links">
       
        <a href="cadastro.php" class="link-admin">
       
            <img src="../img/plus.svg" alt="" class="img-admin"><br>
            <p>Cadastrar produto</p>
        </a>

        
        <a href="visualizar_produtos.php" class="link-admin">
            <img src="../img/visuali.svg" alt="" class="img-admin"><br>
            <p> Visualizar produtos</p>
        </a>
    

        
        <a href="pedidos.php" class="link-admin">
            <img src="../img/pen.svg" alt="" class="img-admin"><br>
            <p>Pedidos</p>
        </a>
        
        <a href="planos.php" class="link-admin">
            <img src="../img/planos.png" alt=""  class="img-admin"><br>
            <p>Planos</p>
        </a>
    </div>

</body>

</html>
