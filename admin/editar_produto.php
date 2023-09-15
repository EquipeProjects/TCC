<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "meubanco";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

$id_produto = $_GET['id']; // Recupere o ID do produto da URL

// Consulta SQL para recuperar as informações do produto
$sql = "SELECT id, nome, valor, descricao, imagem FROM produtos WHERE id = $id_produto";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    // Agora, $row contém as informações do produto que você deseja editar
} else {
    echo "Produto não encontrado.";
}





?>

<form action="processar_edicao.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id_produto" value="<?php echo $row['id']; ?>">
    Nome: <input type="text" name="nome" value="<?php echo $row['nome']; ?>"><br>
    Valor: <input type="text" name="valor" value="<?php echo $row['valor']; ?>"><br>
    Descrição: <textarea name="descricao"><?php echo $row['descricao']; ?></textarea><br>
    Imagem atual: <img src="<?php echo $row['imagem']; ?>" alt="<?php echo $row['nome']; ?>"><br>
    Escolher nova imagem: <input type="file" name="nova_imagem"><br>
    <input type="submit" value="Salvar">
</form>
