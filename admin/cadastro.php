
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

if(isset($_GET['edit_products'])){
    include('edit_products.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Produtos</title>
</head>
<body>
    <h1>Cadastro de Produtos</h1>
    <form action="cadastro_produto.php" method="post" enctype="multipart/form-data">
        Nome: <input type="text" name="nome"><br>
        Valor: <input type="text" name="valor"><br>
        Descrição: <textarea name="descricao"></textarea><br>
         Imagens: <input type="file" name="imagem" onchange="exibirPreview(this)"><br>
        <div id="preview"></div>
        <label for="categoria">Categoria:</label>
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
        <select name="subcategorias" id="subcategoria" >
            <option value="">Selecione uma ou mais subcategorias</option>
        </select>
        <label for="tamanhos">Insira os textos (separados por vírgula):</label><br>
        <textarea name="tamanhos" id="texto" rows="4" cols="50"></textarea><br>
        <input type="submit" value="Cadastrar">
    </form>

    <!-- JavaScript para preencher a lista de subcategorias dinamicamente -->
    <script>
        const categoriaSelect = document.getElementById("categoria");
        const subcategoriaSelect = document.getElementById("subcategoria");

        // Mapeie as opções de subcategoria para cada categoria
        const subcategoriasPorCategoria = {
            1: ["BLUSAS", "CAMISETAS / REGATAS","MOLETONS","CALÇAS", "JEANS","JAQUETAS"],
            2: ["BLUSAS", "CAMISETAS / REGATAS","CAMISETAS DE TIME","MOLETONS","CALÇAS","JEANS"],
            3: ["TOPS / CROPPEDS","MOLETONS","CALÇAS","JEANS","SAIAS / VESTIDOS","JAQUETAS"],
            4: ["MASCULINOS","FEMININOS","INFANTIL"],
        
            // Adicione mais categorias e suas subcategorias conforme necessário
        };

        categoriaSelect.addEventListener("change", function () {
            const selectedCategoria = categoriaSelect.value;
            const subcategorias = subcategoriasPorCategoria[selectedCategoria] || [];

            // Limpe as opções atuais do campo de subcategoria
            subcategoriaSelect.innerHTML = "";

            // Adicione as novas opções com base na categoria selecionada
            subcategorias.forEach(function (subcategoria) {
                const option = document.createElement("option");
                option.value = subcategoria;
                option.textContent = subcategoria;
                subcategoriaSelect.appendChild(option);
            });
        });
         
  
        // Função para exibir uma visualização das imagens selecionadas
        function exibirPreview(input) {
            const preview = document.getElementById("preview");
            preview.innerHTML = ""; // Limpa a visualização atual

            if (input.files && input.files.length > 0) {
                for (let i = 0; i < input.files.length; i++) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const img = document.createElement("img");
                        img.src = e.target.result;
                        img.style.maxWidth = "100px"; // Ajuste o tamanho conforme necessário
                        img.style.marginRight = "10px"; // Espaçamento entre as imagens
                        preview.appendChild(img);
                    };
                    reader.readAsDataURL(input.files[i]);
                }
            }
        }
   
    </script>
</body>
</html>
