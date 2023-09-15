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
    <form action="cadastro_pruduto.php" method="post" enctype="multipart/form-data">
        Nome: <input type="text" name="nome"><br>
        Valor: <input type="text" name="valor"><br>
        Descrição: <textarea name="descricao"></textarea><br>
        Imagem: <input type="file" name="imagem"><br>
        <label for="categoria">Categoria:</label>
<select name="categoria">

                    <option value="">Select Category</option>
                    <?php
                        $select_query="Select * from `categorias`";
                        $result_query=mysqli_query($conn,$select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $category_title = $row['nome'];
                            $category_id = $row['id'];
                            echo "<option value='$category_id'>$category_title</option>";
                        }
                    ?>
              
    <!-- Adicione mais opções de categoria conforme necessário -->
</select>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
