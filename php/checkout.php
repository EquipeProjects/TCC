<?php
session_start();

// Verifica se o carrinho de compras não está vazio
if (empty($_SESSION["shopping_cart"])) {
    echo "Seu carrinho está vazio. Adicione produtos antes de finalizar a compra.";
    exit;
}

// Conexão com o banco de dados MySQL (substitua pelas suas configurações)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "meubanco";

$conn = new mysqli($servername, $username, $password, $dbname);


// Verifica a conexão com o banco de dados
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Recupera o nome do cliente (pode ser obtido de um formulário)
$nome_cliente = "Exemplo de Nome do Cliente";

// Calcula o total do pedido
$total_pedido = 0;
foreach ($_SESSION["shopping_cart"] as $product) {
    $total_pedido += ($product["price"] * $product["quantity"]);
}

// Define o status do pagamento como "pendente"
$status_pagamento = "pendente";

// Insere o pedido na tabela "pedidos" com o status do pagamento
$sql = "INSERT INTO pedidos (nome_cliente, total_pedido, status_pagamento) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sds", $nome_cliente, $total_pedido, $status_pagamento);

if ($stmt->execute()) {
    // Limpa o carrinho de compras após a conclusão da compra
    unset($_SESSION["shopping_cart"]);
    echo "Pedido finalizado com sucesso! Obrigado pela sua compra.";
} else {
    echo "Erro ao finalizar o pedido: " . $stmt->error;
}

// Fecha a conexão com o banco de dados
$stmt->close();
$conn->close();
?>
