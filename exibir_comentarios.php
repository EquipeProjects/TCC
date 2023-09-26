<?php
// Conectar ao banco de dados
$mysqli = new mysqli("localhost", "root", "", "sistema_login");

// Verificar a conexão
if ($mysqli->connect_error) {
    die("Erro na conexão: " . $mysqli->connect_error);
}

// Selecionar os comentários do banco de dados
$sql = "SELECT * FROM comentarios";
$result = $mysqli->query($sql);

// Verificar se a consulta retornou resultados
if ($result->num_rows > 0) {
    // Loop através dos resultados e exibir cada comentário
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . "<br>";
        echo "Nome: " . $row["nome"] . "<br>";
        echo "Comentário: " . $row["comentario"] . "<br>";
        echo "<hr>";
    }
} else {
    echo "Nenhum comentário encontrado.";
}

// Fechar a conexão com o banco de dados
$mysqli->close();
?>
