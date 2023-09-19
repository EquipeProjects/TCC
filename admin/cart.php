<?php
// Inclua sua conexão com o banco de dados aqui

$servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "meubanco";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Erro na conexão com o banco de dados: " . $conn->connect_error);
            }

// Verifique se o parâmetro "add" foi enviado na URL
if (isset($_GET['add'])) {
    $productId = $_GET['add'];

    // Consulta para obter informações do produto
    $query = "SELECT * FROM produtos WHERE id = $productId";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        // Adicione o produto ao carrinho
        $_SESSION['carrinho'][] = [
            'id' => $row['id'],
            'nome' => $row['nome'],
            'valor' => $row['valor'],
        ];
    }
}

// Exibir o carrinho
if (isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0) {
    echo "<h1>Seu Carrinho de Compras</h1>";
    echo "<ul>";
    $total = 0;

    foreach ($_SESSION['carrinho'] as $item) {
        echo "<li>{$item['nome']} - Preço: $" . $item['valor'] . "</li>";
        $total += $item['valor'];
    }

    echo "</ul>";
    echo "<p>Total: $" . $total . "</p>";
} else {
    echo "<p>Seu carrinho está vazio.</p>";
}
