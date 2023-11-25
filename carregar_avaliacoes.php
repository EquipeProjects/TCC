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
$sql_avaliacoes = "SELECT * FROM avaliacoes WHERE produto_id = $produto_id ORDER BY id DESC ";
$result_avaliacoes = $conn->query($sql_avaliacoes);

if ($result_avaliacoes->num_rows > 0) {
    foreach ($result_avaliacoes as $avaliacao) {
        echo "<div class='avaliacao-item stars ratin'>";
        echo "<p class='avaliacao-estrelas'>Avaliação: ";
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $avaliacao['avaliacao']) {
                echo "<span  style='color:yellow;'>&#9733</span>"; // Estrela preenchida
            } else {
                echo "<span>&#9733</span>"; // Estrela vazia
            }
        }
        echo "</p><p>Comentário:</p>";
        echo "<p class='avaliacao-comentario'> " . $avaliacao['comentario'] . "</p>";
        echo "</div>";
    }
} else {
    echo "<p>Ainda não há avaliações para este produto.</p>";
}
?>
