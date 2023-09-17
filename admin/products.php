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

// Consulta para obter a lista de produtos
$query = "SELECT * FROM produtos";
$result = mysqli_query($conn, $query);

// Exibir a lista de produtos
while ($row = mysqli_fetch_assoc($result)) {
    echo "<h2>" . $row['nome'] . "</h2>";
    echo "<p>Preço: $" . $row['valor'] . "</p>";
    echo "<button onclick='addToCart(" . $row['id'] . ")'>Adicionar ao Carrinho</button>";
}
?>

<script>
function addToCart(productId) {
    // Use JavaScript para enviar uma solicitação AJAX ou redirecionar para a página de carrinho com o ID do produto
    window.location.href = "cart.php?add=" + productId;
}
</script>
