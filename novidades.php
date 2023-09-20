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
                <div class='product_box'> <img class='img_novidade' src='admin/{$row['imagem']}' alt='{$row['nome']}'>
                    <div class='preco_product'>{$row['valor']}</div>
                </div>
                <div class='text_product'>{$row['nome']}</div>
                <div class='sob_categoria'>Casual</div>
                
            </div>

         
              
          ";
                    }
                } else {
                    echo "Nenhum produto nesta categoria.";
                }



                ?>


                <div class="product_space">
                    <div class="product_box"><img class="img_novidade" src="img/gola_alta.jpg">
                        <div class="preco_product">R$ 39,00</div>
                    </div>
                    <div class="text_product">Camisa gola alta preta</div>
                    <div class="sob_categoria">Casual</div>
                </div>

            </div>
        </div>
        </div>
        </div>
    </main>

    <footer>
        <div class="grid-container">
            <div class="grid-item">ENCONTRE UMA LOJA EASY FIT</div>
            <div class="grid-item">REDES SOCIAIS
                <div>
                    <img class="footer_rede" src="/img/instagram.png">
                    <img class="footer_rede" src="/img/facebbok.png">
                    <img class="footer_rede" src="/img/youtube.png">
                </div>
            </div>
            <div class="grid-item">
                <a class="link_sobrenos" href="sobrenos.html">
                    <div>SOBRE A EASY FIT</div>
                </a>
                <div class="footer_text">SUSTENTABILIDADE</div>
            </div>
            <div class="grid-item">AJUDA
                <div class="footer_text">DÚVIDAS GERAIS</div>
                <div class="footer_text">TROCAS E DEVOLUÇÕES </div>
                <div class="footer_text">PAGAMENTOS</div>
                <div class="footer_text">FALE CONOSCO </div>
            </div>
            <div class="grid-item">
                <div>FORMAS DE PAGAMENTO</div>
                <div class="flex_pag">
                    <img class="footer_pag" src="/img/mastercard.svg">
                    <img class="footer_pag" src="/img/hipercard.svg">
                </div>
                <img class="footer_pag" src="/img/visa.svg">
                <img class="footer_pag" src="/img/elo.svg">
                <img class="footer_pag" src="/img/amex.svg">
            </div>
            <div class="grid-item"></div>
            <div class="grid-item">
                <div>© 2023 EASY FIT. Visa um Comércio de Produtos gerais da moda Ltda - Todos os direitos reservados.
                </div>
            </div>
            <div class="grid-item">POLÍTICA DE PRIVACIDADE</div>
            <div class="grid-item">BRASIL</div>
        </div>
    </footer>
</body>

</html>