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
                $sql = "SELECT id, nome, valor, imagem FROM produtos";
                $result = $conn->query($sql);


                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "
                
            <div class='product_space'>
            <a href='produto.php?id=" . $row['id'] . "'> 
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
    <script src="js/index.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hamburgerMenu = document.querySelector('.hamburger-menu');
            const centerLinks = document.querySelector('.center-links ul');

            hamburgerMenu.addEventListener('click', function() {
                centerLinks.classList.toggle('active');
            });
        });
    </script>
</body>

</html>