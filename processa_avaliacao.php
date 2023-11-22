<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "meubanco";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

error_log("Entrou no arquivo processa_avaliacao.php", 0);

$resposta = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $produto_id = intval($_POST['produto_id']); // Supondo que o ID do produto seja enviado via POST
    $avaliacao = intval($_POST['avaliacao']);
    $comentario = $_POST['comentario'];

    // Realize validação e sanitização, se necessário

    $sql_inserir_avaliacao = "INSERT INTO avaliacoes (cliente_id, produto_id, avaliacao, comentario) VALUES (1, $produto_id , $avaliacao, '$comentario')";

    if ($conn->query($sql_inserir_avaliacao) === TRUE) {
        $resposta['status'] = 'sucesso';
        $resposta['mensagem'] = 'Avaliação enviada com sucesso!';
    } else {
        $resposta['status'] = 'erro';
        $resposta['mensagem'] = 'Erro ao enviar a avaliação: ' . $conn->error;
    }
} else {
    $resposta['status'] = 'erro';
    $resposta['mensagem'] = 'Método de requisição inválido';
}

header('Content-Type: application/json');
echo json_encode($resposta);

$conn->close();
?>
