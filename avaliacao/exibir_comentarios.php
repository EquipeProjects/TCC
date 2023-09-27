<?php
// Conectar ao banco de dados (configure com suas próprias informações)
$mysqli = new mysqli("localhost", "root", "", "sistema_login");

// Verificar a conexão
if ($mysqli->connect_error) {
    die("Erro na conexão: " . $mysqli->connect_error);
}

// Selecionar os comentários do banco de dados
$sql = "SELECT classificacao, comentario FROM avaliacoes";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<p>Classificação: " . $row["classificacao"] . " estrela(s)</p>";
        echo "<p>Comentário: " . $row["comentario"] . "</p>";
        echo "</div>";
    }
} else {
    echo "Nenhum comentário encontrado.";
}

// Fechar a conexão com o banco de dados
$mysqli->close();
?>
