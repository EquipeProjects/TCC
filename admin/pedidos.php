<?php
session_start();

// Conectar ao banco de dados
$hostname = "localhost";
$username = "root";
$password = "";
$database = "meubanco";

$conexao = mysqli_connect($hostname, $username, $password, $database);

if (mysqli_connect_errno()) {
    die("Falha ao conectar ao MySQL: " . mysqli_connect_error());
}

// Consulta para obter todos os pedidos do cliente
$id_cliente = $_SESSION['id'];
$query_pedidos = "SELECT * FROM pedidos WHERE id_cliente = '$id_cliente' ORDER BY data_pedido DESC";
$result_pedidos = mysqli_query($conexao, $query_pedidos);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Pedidos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <h2>Meus Pedidos</h2>

    <table>
        <thead>
            <tr>
                <th>ID do Pedido</th>
                <th>Data do Pedido</th>
                <th>Status do Pedido</th>
                <th>Total do Pedido</th>
                <th>Detalhes</th>
                <th>Ações</th>
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
                echo "<td>";

                if ($row['status_pedido'] == 'Pago') {
                    echo "<form action='pedidos.php' method='post'>";
                    echo "<input type='hidden' name='id_pedido_enviar' value='{$row['id_pedido']}'>";
                    echo "<button type='submit' name='enviar_produto'>Enviar Produto</button>";
                    echo "</form>";
                }

                echo "<form action='pedidos.php' method='post'>";
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
            $atualizar_status_query = "UPDATE pedidos SET status_pedido = 'Enviado', data_envio = NOW() WHERE id_pedido = '$id_pedido_enviar'";
            mysqli_query($conexao, $atualizar_status_query);
        } elseif (isset($_POST['cancelar_pedido'])) {
            $id_pedido_cancelar = mysqli_real_escape_string($conexao, $_POST['id_pedido_cancelar']);
            $atualizar_status_query = "UPDATE pedidos SET status_pedido = 'Cancelado' WHERE id_pedido = '$id_pedido_cancelar'";
            mysqli_query($conexao, $atualizar_status_query);
        }

        // Atualizar a tabela de pedidos após o envio ou cancelamento
        header('Location: pedidos.php');
        exit();
    }

    mysqli_close($conexao);
    ?>

</body>

</html>
