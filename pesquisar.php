<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/novidades.css">
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
                if (isset($_GET['termo_pesquisa'])) {
                    $termo_pesquisa = $_GET['termo_pesquisa'];
                
                    // Construa a consulta SQL para buscar produtos com base no termo de pesquisa
                    $sql = "SELECT id, nome, valor, imagem FROM produtos WHERE nome LIKE '%$termo_pesquisa%' OR descricao LIKE '%$termo_pesquisa%'";
                

             

                    $result = $conn->query($sql);
                } else {
                    // Lógica para lidar com o caso em que a categoria não foi fornecida
                }

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "
                        
            <div class='product_space'>
                    <a style='text-decoration:none;' href='produto.php?id=" . $row['id'] . "'> 
                <div class='product_box'> <img class='img_novidade' src='admin/{$row['imagem']}' alt='{$row['nome']}'>
                    <div class='preco_product'>{$row['valor']}</div>
                </div>
                <div class='text_product'>{$row['nome']}</div>
                <div class='sob_categoria'>Casual</div>
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