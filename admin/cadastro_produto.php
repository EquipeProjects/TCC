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

$categoria_id = $_POST['categoria'];
$subcategoria = $_POST["subcategorias"];

// Upload de imagem
$imagem_nome = $_FILES['imagem']['name'];
$imagem_temp = $_FILES['imagem']['tmp_name'];
$imagem_caminho = 'uploads/' . $imagem_nome; // Diretório onde as imagens serão armazenadas

move_uploaded_file($imagem_temp, $imagem_caminho);


$imagem_nome2 = $_FILES['imagem2']['name'];
$imagem_temp2 = $_FILES['imagem']['tmp_name'];
$imagem_caminho = 'uploads/' . $imagem_nome2; // Diretório onde as imagens serão armazenadas

move_uploaded_file($imagem_temp2, $imagem_caminho);
// Tamanhos (obtenha-os como uma string e depois divida em um array)
$tamanhos_string = $_POST['tamanhos'];
$tamanhos_array = explode(",", $tamanhos_string);

// Inserção na tabela "produtos"
$insert_produto_query = "INSERT INTO produtos (nome, valor, descricao, imagem, imagem2 categoria_id, subcategoria) VALUES ('$nome', '$valor', '$descricao', '$imagem_caminho', '$categoria_id', '$subcategoria')";

if ($conn->query($insert_produto_query) === TRUE) {
    $produto_id = $conn->insert_id; // Obtém o ID do produto inserido
} else {
    echo "Erro ao cadastrar o produto: " . $conn->error;
    $conn->close();
    exit;
}

// Inserção na tabela de associação "produto_tamanho"
foreach ($tamanhos_array as $tamanho) {
    $tamanho = trim($tamanho); // Remova espaços em branco extras
    $tamanho = mysqli_real_escape_string($conn, $tamanho); // Evita SQL Injection
    $stock = 0; // Você pode definir o estoque inicial como desejado
    $insert_association_query = "INSERT INTO tamanhos (produto_id, nome_tamanho, estoque) VALUES ('$produto_id', '$tamanho', '$stock')";
    
    if ($conn->query($insert_association_query) !== TRUE) {
        echo "Erro ao associar tamanho ao produto: " . $conn->error;
    }
}

echo "Produto cadastrado com sucesso!";

$conn->close();
?>
