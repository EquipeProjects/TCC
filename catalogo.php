<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/novidades.css">
    <style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
</style>
    <title>Novidades</title>
</head>

<body>
    <?php
    include('php/header.php'); // Inclui o cabeçalho
    ?>
    <main>


        <div class="flex_novid">
            <div class="menu_novid">
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "meubanco";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
                }

                // ID da categoria correspondente a esta página (modificar conforme necessário)

                // Consulta SQL para selecionar produtos da categoria correspondente
                $categoria_id = isset($_GET['categoria']) ? $_GET['categoria'] : null;
                $subcategoria = isset($_GET['sub']) ? $_GET['sub'] : null;

                if ($categoria_id !== null) {
                    // Consulta SQL para selecionar produtos da categoria correspondente
                    $sql = "SELECT id, nome, valor, imagem, subcategoria FROM produtos WHERE categoria_id = $categoria_id";

                    // Verifica se a subcategoria também foi fornecida
                    if ($subcategoria !== null) {
                        $sql .= " AND subcategoria = '$subcategoria'";
                    }

                    $result = $conn->query($sql);
                } else {
                    // Lógica para lidar com o caso em que a categoria não foi fornecida
                }

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "
                        <div class='product_space'>
                        <img class='heartfavorit' id='favicon' src='img/heart.svg' alt=''>
                        <a class='linkdoproduto' href='produto.php?id=" . $row['id'] . "'> 
                            <div class='product_box'> <img class='img_novidade' src='admin/{$row['imagem']}' alt='{$row['nome']}'>
                                <div class='preco_product'> R$ {$row['valor']}</div>
                            </div>
                            <div class='text_product'>{$row['nome']}</div>
                            <div class='sob_categoria's>{$row['subcategoria']}</div>
                            </a>
                        </div>

              
          ";
                    }
                } else {
                    echo "Nenhum produto nesta categoria.";
                }



                ?>




            </div>
        </div>
        </div>
        </div>
    </main>

    <?php 
    include('php/footer.php')
    ?>
</body>

</html>