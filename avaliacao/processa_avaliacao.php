<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Conectar ao banco de dados (configure com suas próprias informações)
    $mysqli = new mysqli("localhost", "root", "", "sistema_login");

    // Verificar a conexão
    if ($mysqli->connect_error) {
        die("Erro na conexão: " . $mysqli->connect_error);
    }

    // Receber dados do formulário
    $ratingValue = $_POST["ratingValue"];
    $commentText = $_POST["commentText"];

    // Preparar a instrução SQL para inserir dados
    $stmt = $mysqli->prepare("INSERT INTO avaliacoes (classificacao, comentario) VALUES (?, ?)");
    $stmt->bind_param("is", $ratingValue, $commentText);

    // Executar a inserção
    if ($stmt->execute()) {
        // Redirecionar de volta para a página principal após a inserção
        header("Location: index.php");
    } else {
        echo "Erro ao inserir avaliação: " . $stmt->error;
    }

    // Fechar a conexão com o banco de dados
    $stmt->close();
    $mysqli->close();
}
?>
