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

// Tamanhos (obtenha-os como uma string e depois divida em um array)
$tamanhos_string = $_POST['tamanhos'];
$tamanhos_array = explode(",", $tamanhos_string);

// Inserção na tabela "tamanhos" e obtenção dos IDs dos tamanhos
$tamanho_ids = array(); // Para armazenar os IDs dos tamanhos selecionados
foreach ($tamanhos_array as $tamanho) {
    $tamanho = trim($tamanho); // Remova espaços em branco extras
    $tamanho = mysqli_real_escape_string($conn, $tamanho); // Evita SQL Injection
    $stock = 0; // Você pode definir o estoque inicial como desejado
    $insert_tamanho_query = "INSERT INTO tamanhos (nome_tamanho, estoque) VALUES ('$tamanho', $stock)";
    
    if ($conn->query($insert_tamanho_query) === TRUE) {
        $tamanho_ids[] = $conn->insert_id; // Armazena o ID do tamanho inserido
    } else {
        echo "Erro ao inserir o tamanho: " . $conn->error;
    }
}

// Converta os IDs dos tamanhos em uma string separada por vírgulas
$tamanho_ids_str = implode(",", $tamanho_ids);

// Inserção na tabela "produtos" com os IDs dos tamanhos associados
$sql = "INSERT INTO produtos (nome, valor, descricao, imagem, categoria_id, subcategoria, tamanho_id) VALUES ('$nome', '$valor', '$descricao', '$imagem_caminho', '$categoria_id', '$subcategoria', '$tamanho_ids_str')";

if ($conn->query($sql) === TRUE) {
    echo "Produto cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar o produto: " . $conn->error;
}

$conn->close();
?>