<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "meubanco";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

$id_produto = $_GET['produto_id']; // Recupere o ID do produto da URL

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


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>

<body>
<h1>Atualização de Produtos</h1>
    <form action="processar_edicao.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_produto" value="<?php echo $row['id']; ?>">
        Nome: <input type="text" name="nome" value="<?php echo $row['nome']; ?>"><br>
        Valor: <input type="text" name="valor" value="<?php echo $row['valor']; ?>"><br>
        Descrição: <textarea name="descricao"><?php echo $row['descricao']; ?></textarea><br>
        Imagem atual: <img style="width: 150px;" src="<?php echo $row['imagem']; ?>" alt="<?php echo $row['nome']; ?>"><br>
        Escolher nova imagem: <input type="file" name="nova_imagem"><br>
        Imagens secundarias:
        Escolha imagens:
        <input type="file" name="imagens_secundarias[]" multiple>
        <input type="file" name="imagens_secundarias[]" multiple>
        <input type="file" name="imagens_secundarias[]" multiple>
        <br>
        Categoria:
        <select name="categoria" id="categoria">
            

            <option value="">Selecione uma categoria</option>
            <?php
            $select_query = "SELECT * FROM categorias";
            $result_query = mysqli_query($conn, $select_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
                $category_title = $row['nome'];
                $category_id = $row['id'];
                echo "<option value='$category_id'>$category_title</option>";
            }
            ?>
            </select>
            <label for="subcategoria">Subcategorias:</label>
            <select name="subcategoria" id="subcategoria">
                <option value="">Selecione uma ou mais subcategorias</option>
            </select><br>
            Tamanhos/Estoques:
            <div id="tamanhos_estoques_container">
                <?php
                // Recupere os tamanhos e estoques deste produto
                $sql_tamanhos = "SELECT nome_tamanho, estoque FROM tamanhos WHERE produto_id = $id_produto";
                $result_tamanhos = $conn->query($sql_tamanhos);
                while ($row_tamanho = $result_tamanhos->fetch_assoc()) {
                    echo '<div>';
                    echo 'Tamanho: <input type="text" name="tamanhos[]" value="' . $row_tamanho['nome_tamanho'] . '"> ';
                    echo 'Estoque: <input type="text" name="estoques[]" value="' . $row_tamanho['estoque'] . '"> ';
                    echo '<button type="button" onclick="removerCampo(this)">Remover</button>';
                    echo '</div>';
                }
                ?>
            </div>
            <button type="button" onclick="adicionarCampo()">Adicionar Tamanho/Estoque</button><br>
            <input type="submit" value="Salvar">
    </form>
    <script>
        // Seu código JavaScript existente para preencher as subcategorias dinamicamente
       const categoriaSelect = document.getElementById("categoria");
        const subcategoriaSelect = document.getElementById("subcategoria");

        // Mapeie as opções de subcategoria para cada categoria
        const subcategoriasPorCategoria = {
            1: ["BLUSAS", "CAMISETAS / REGATAS", "MOLETONS", "CALÇAS", "JEANS", "JAQUETAS"],
            2: ["BLUSAS", "CAMISETAS / REGATAS", "CAMISETAS DE TIME", "MOLETONS", "CALÇAS", "JEANS"],
            3: ["TOPS / CROPPEDS", "MOLETONS", "CALÇAS", "JEANS", "SAIAS / VESTIDOS", "JAQUETAS"],
            4: ["MASCULINOS", "FEMININOS", "INFANTIL"],

            // Adicione mais categorias e suas subcategorias conforme necessário
        };

        categoriaSelect.addEventListener("change", function() {
            const selectedCategoria = categoriaSelect.value;
            const subcategorias = subcategoriasPorCategoria[selectedCategoria] || [];

            // Limpe as opções atuais do campo de subcategoria
            subcategoriaSelect.innerHTML = "";

            // Adicione as novas opções com base na categoria selecionada
            subcategorias.forEach(function(subcategoria) {
                const option = document.createElement("option");
                option.value = subcategoria;
                option.textContent = subcategoria;
                subcategoriaSelect.appendChild(option);
            });
        });


        // Função para adicionar novos campos de tamanho/estoque
        function adicionarCampo() {
            var container = document.getElementById("tamanhos_estoques_container");
            var novoCampo = document.createElement("div");
            novoCampo.innerHTML = 'Tamanho: <input type="text" name="tamanhos[]"> Estoque: <input type="text" name="estoques[]"> <button type="button" onclick="removerCampo(this)">Remover</button>';
            container.appendChild(novoCampo);
        }

        // Função para remover campos de tamanho/estoque
        function removerCampo(elemento) {
            var container = document.getElementById("tamanhos_estoques_container");
            container.removeChild(elemento.parentNode);
        }
    </script>

</body>

</html>