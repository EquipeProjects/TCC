<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "meubanco";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}
// Substitua isso com sua lógica para buscar avaliações do banco de dados
if (isset($_GET['id'])) {
    $produto_id = intval($_GET['id']);

    // Resto do seu código para buscar avaliações com base no $produto_id
} else {
    echo "Erro: O parâmetro 'id' não foi fornecido.";
}
$sql_avaliacoes = "SELECT * FROM avaliacoes WHERE produto_id = $produto_id";
$result_avaliacoes = $conn->query($sql_avaliacoes);

if ($result_avaliacoes->num_rows > 0) {
    echo "<p>Avaliações existentes:</p><ul>";
    while ($row = $result_avaliacoes->fetch_assoc()) {
        echo "<li>" . $row['avaliacao'] . " estrelas - " . $row['comentario'] . "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>Ainda não há avaliações para este produto.</p>";
}
?>
