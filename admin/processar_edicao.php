<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "meubanco";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

if(isset($_GET['edit_products'])){
    include('edit_products.php');
}


$id_produto = $_POST['id'];
$nome = $_POST['nome'];
$valor = $_POST['valor'];
$descricao = $_POST['descricao'];

// Processar a imagem, se uma nova imagem for enviada
if (!empty($_FILES['nova_imagem']['tmp_name'])) {
    // Lógica para fazer o upload da nova imagem e atualizar o caminho no banco de dados
}

// Atualizar as informações do produto no banco de dados
$sql = "UPDATE produtos SET nome = '$nome', valor = '$valor', descricao = '$descricao' WHERE id = $id_produto";
if ($conn->query($sql) === TRUE) {
    echo "Produto atualizado com sucesso.";
} else {
    echo "Erro ao atualizar o produto: " . $conn->error;
}


?>