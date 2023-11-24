<?php
session_start();

if (!isset($_SESSION['id'])) {
    // Verifique se o usuário está autenticado
    header('Location: login.php');
    exit();
}

// Conecte-se ao banco de dados
$conexao = mysqli_connect("localhost", "root", "", "meubanco");

if (mysqli_connect_errno()) {
    echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
    exit;
}

// Consulta para obter todos os pedidos do cliente
$id_cliente = $_SESSION['id'];
$query_pedidos = "SELECT * FROM pedidos WHERE id_cliente = '$id_cliente' ORDER BY data_pedido DESC";
$result_pedidos = mysqli_query($conexao, $query_pedidos);

// Feche a conexão com o banco de dados

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Pedidos</title>
</head>
<body>

<h2>Meus Pedidos</h2>

<table border="1">
    <thead>
        <tr>
            <th>ID do Pedido</th>
            <th>Data do Pedido</th>
            <th>Status do Pedido</th>
            <th>Total do Pedido</th>
            <th>Detalhes</th>
            <th>Ações</th> <!-- Adicione esta coluna -->
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result_pedidos)) {
            echo "<tr>";
            echo "<td>{$row['id_pedido']}</td>";
            echo "<td>{$row['data_pedido']}</td>";
            echo "<td>{$row['status_pedido']}</td>";
            echo "<td>R$ {$row['total_pedido']}</td>";
            echo "<td><a href='detalhes_pedido.php?id={$row['id_pedido']}'>Detalhes</a></td>";
            
            // Adicione esta coluna para ações
            echo "<td>";

            // Adicione botão de envio se o status for "Pago"
            if ($row['status_pedido'] == 'Pago') {
                echo "<form action='pedido.php' method='post'>";
                echo "<input type='hidden' name='id_pedido_enviar' value='{$row['id_pedido']}'>";
                echo "<button type='submit' name='enviar_produto'>Enviar Produto</button>";
                echo "</form>";
            }
            
            // Adicione botão de cancelamento
            echo "<form action='pedido.php' method='post'>";
            echo "<input type='hidden' name='id_pedido_cancelar' value='{$row['id_pedido']}'>";
            echo "<button type='submit' name='cancelar_pedido'>Cancelar</button>";
            echo "</form>";
            
            echo "</td>";
            
            echo "</tr>";
        }
        ?>
    </tbody>
</table>


<?php
// Processar envio do produto ou cancelamento
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['enviar_produto'])) {
        $id_pedido_enviar = mysqli_real_escape_string($conexao, $_POST['id_pedido_enviar']);

        // Exemplo de lógica de envio de produto
        // Atualize o status do pedido para "Enviado" e registre a data de envio
        $atualizar_status_query = "UPDATE pedidos SET status_pedido = 'Enviado', data_envio = NOW() WHERE id_pedido = '$id_pedido_enviar'";
        mysqli_query($conexao, $atualizar_status_query);
    } elseif (isset($_POST['cancelar_pedido'])) {
        $id_pedido_cancelar = mysqli_real_escape_string($conexao, $_POST['id_pedido_cancelar']);

        $atualizar_status_query = "UPDATE pedidos SET status_pedido = 'Cancelado' WHERE id_pedido = '$id_pedido_cancelar'";
        mysqli_query($conexao, $atualizar_status_query);
    }

    // Atualize a tabela de pedidos após o envio ou cancelamento
    header('Location: pedido.php');
    exit();
    mysqli_close($conexao);
}

// ... (código posterior) ...
?>

</body>
</html>
