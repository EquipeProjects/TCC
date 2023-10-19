<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "meubanco";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Recupere os dados do formulário
$id_produto = $_POST['id_produto'];
$nome = $_POST['nome'];
$valor = $_POST['valor'];
$descricao = $_POST['descricao'];

// Processar a imagem, se uma nova imagem for enviada
if (!empty($_FILES['nova_imagem']['tmp_name'])) {
    $imagem_temp = $_FILES['nova_imagem']['tmp_name'];
    $imagem_nome = $_FILES['nova_imagem']['name'];
    $imagem_caminho = 'uploads/' . $imagem_nome; // Ajuste o caminho conforme necessário

    if (move_uploaded_file($imagem_temp, $imagem_caminho)) {
        // Atualize o caminho da nova imagem no banco de dados
        $sql_update_imagem = "UPDATE produtos SET imagem = '$imagem_caminho' WHERE id = $id_produto";
        if ($conn->query($sql_update_imagem) === FALSE) {
            echo "Erro ao atualizar o caminho da imagem: " . $conn->error;
        }
    } else {
        echo "Erro ao fazer o upload da nova imagem.";
    }
}

$imagens_secundarias = [];

if (!empty($_FILES['imagens']['name'][0])) {
    foreach ($_FILES['imagens']['name'] as $key => $nomeImagem) {
        $imagem_temp = $_FILES['imagens']['tmp_name'][$key];
        $imagem_caminho = 'uploads/' . $nomeImagem;

        if (move_uploaded_file($imagem_temp, $imagem_caminho)) {
            $imagens_secundarias[] = $imagem_caminho;
        } else {
            echo "Erro ao fazer upload da imagem secundária: $nomeImagem";
        }
    }
}

// Agora, você pode inserir os caminhos das imagens secundárias no banco de dados
if (!empty($imagens_secundarias)) {
    foreach ($imagens_secundarias as $caminhoImagem) {
        $insert_imagem_query = "INSERT INTO imagens_produto (produto_id, caminho) VALUES ('$produto_id', '$caminhoImagem')";
        if ($conn->query($insert_imagem_query) !== TRUE) {
            echo "Erro ao inserir imagem secundária no banco de dados.";
        }
    }
}

// Atualizar as informações do produto no banco de dados
$sql = "UPDATE produtos SET nome = '$nome', valor = '$valor', descricao = '$descricao' WHERE id = $id_produto";
if ($conn->query($sql) === TRUE) {
    echo "Produto atualizado com sucesso.";
} else {
    echo "Erro ao atualizar o produto: " . $conn->error;
}

// Processar categoria, subcategoria e tamanhos/estoques
$categoria = $_POST['categoria'];
$subcategoria = $_POST['subcategoria'];
$tamanhos = $_POST['tamanhos'];
$estoques = $_POST['estoques'];

// Atualize a categoria e subcategoria do produto no banco de dados
$sql_update_categoria = "UPDATE produtos SET categoria_id = '$categoria', subcategoria = '$subcategoria' WHERE id = $id_produto";
if ($conn->query($sql_update_categoria) === FALSE) {
    echo "Erro ao atualizar categoria e subcategoria: " . $conn->error;
}

// Excluir todos os tamanhos/estoques existentes para este produto
$sql_delete_tamanhos = "DELETE FROM tamanhos WHERE produto_id = $id_produto";
if ($conn->query($sql_delete_tamanhos) === FALSE) {
    echo "Erro ao excluir tamanhos/estoques existentes: " . $conn->error;
}

// Inserir os novos tamanhos/estoques
for ($i = 0; $i < count($tamanhos); $i++) {
    $tamanho = mysqli_real_escape_string($conn, $tamanhos[$i]);
    $estoque = mysqli_real_escape_string($conn, $estoques[$i]);
    
    $sql_insert_tamanho = "INSERT INTO tamanhos (produto_id, nome_tamanho, estoque) VALUES ('$id_produto', '$tamanho', '$estoque')";
    
    if ($conn->query($sql_insert_tamanho) === FALSE) {
        echo "Erro ao inserir tamanho/estoque: " . $conn->error;
    }
}

// Feche a conexão com o banco de dados
$conn->close();
?>
