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
$altura = $_POST["altura"];
$largura = $_POST["largura"];
$comprimento = $_POST["comprimento"];
$peso = $_POST["peso"];
$imagem_nome = $_FILES['imagem']['name'];
$imagem_temp = $_FILES['imagem']['tmp_name'];
$imagem_caminho = 'uploads/' . $imagem_nome; // Diretório onde as imagens serão armazenadas

move_uploaded_file($imagem_temp, $imagem_caminho);

$insert_produto_query = "INSERT INTO produtos (nome, valor, descricao, imagem, categoria_id, subcategoria,altura,largura,comprimento,peso) VALUES ('$nome', '$valor', '$descricao', '$imagem_caminho', '$categoria_id', '$subcategoria','$altura','$largura','$comprimento','$peso')";

if ($conn->query($insert_produto_query) === TRUE) {
    $produto_id = $conn->insert_id; // Obtém o ID do produto inserido

    // Upload de imagens secundárias
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

    // Recupere os tamanhos e estoques como arrays
$tamanhos = $_POST['tamanhos'];
$estoques = $_POST['estoques'];

// Certifique-se de que ambos os arrays tenham o mesmo número de elementos
if (count($tamanhos) != count($estoques)) {
    echo "Erro: Os tamanhos e estoques não correspondem.";
    exit;
}

// Inserção na tabela "produtos"

// Inserção na tabela de associação "produto_tamanho" com estoque
for ($i = 0; $i < count($tamanhos); $i++) {
    $tamanho = mysqli_real_escape_string($conn, $tamanhos[$i]);
    $estoque = mysqli_real_escape_string($conn, $estoques[$i]);

    $insert_association_query = "INSERT INTO tamanhos (produto_id, nome_tamanho, estoque) VALUES ('$produto_id', '$tamanho', '$estoque')";

    if ($conn->query($insert_association_query) !== TRUE) {
        echo "Erro ao associar tamanho ao produto: " . $conn->error;
    }
}

echo "Produto cadastrado com sucesso!";

    header("Location: visualizar_produtos.php");
    exit();
} else {
    echo "Erro ao cadastrar o produto: " . $conn->error;
}


$conn->close();
?>
