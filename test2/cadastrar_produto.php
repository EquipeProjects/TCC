<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "meubanco";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Processamento do formulário
$nome = $_POST['nome'];
$valor = $_POST['valor'];
$descricao = $_POST['descricao'];


// Upload de imagem
$imagem_nome = $_FILES['imagem']['name'];
$imagem_temp = $_FILES['imagem']['tmp_name'];
$imagem_caminho = 'uploads/' . $imagem_nome; // Diretório onde as imagens serão armazenadas

move_uploaded_file($imagem_temp, $imagem_caminho);


// Inserção no banco de dados
$sql = "INSERT INTO produtos (nome, valor, descricao, imagem) VALUES ('$nome', '$valor', '$descricao', '$imagem_caminho')";

if ($conn->query($sql) === TRUE) {
    echo "Produto cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar o produto: " . $conn->error;
}

$conn->close();
?>
