<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "meubanco";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Obtém o ID do produto da consulta GET
$produto_id = intval($_GET['id']);

// Consulta o produto
$sql_produto = "SELECT * FROM produtos WHERE id = $produto_id";
$result_produto = $conn->query($sql_produto);

if ($result_produto->num_rows > 0) {
    $produto = $result_produto->fetch_assoc();
} else {
    echo "Produto não encontrado.";
    $conn->close();
    exit;
}

// Consulta os tamanhos associados ao produto
$sql_tamanhos = "SELECT * FROM tamanhos WHERE produto_id = $produto_id";
$result_tamanhos = $conn->query($sql_tamanhos);

$tamanhos = array(); // Array para armazenar os tamanhos

if ($result_tamanhos->num_rows > 0) {
    while ($row = $result_tamanhos->fetch_assoc()) {
        $tamanhos[] = $row['nome_tamanho'];
    }
}




$conn->close();






?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easyfit</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/produto.css">
    <link rel="shortcut icon" href="ico/logo.ico" type="image/x-icon">
    <meta name="author" content="João Victor,Davi Ribeiro e Yzabella Luiza">
    <meta name="keywords" content="HTML,CSS,JavaScript">
    <meta name="description" content="Um web site de vendas de roupas sob medida que adequa qualquer corpo,gosto e estilo.">
</head>

<body>
<?php
    include('php/header.php'); // Inclui o cabeçalho
    ?>

    <main style="background-color: #D9D9D8; width: 100%;">

        <div class="container">
            <div style="display: flex;  height: 50px;">
                <a href="#" style="justify-content: center;align-items: center;"><img src="img/bag.png" style="width: 50px; " alt=""> loja Easy fit
                    <img src="img/seta-direita.png" style="width: 50px;" alt="">
                </a>

            </div>
            <div class="product-details">
                <div class="product-images">

                    <img src="admin/<?php echo $produto['imagem'] ?>" alt="Imagem 1" onclick="changeImage('admin/<?php echo $produto['imagem'] ?>')">
                    <img src="img/pe2.jpg" alt="Imagem 2" onclick="changeImage('img/pe2.jpg')">
                    <img src="img/pe2.jpg" alt="Imagem 3" onclick="changeImage('img/pe2.jpg')">
                    <img src="img/pe2.jpg" alt="Imagem 3" onclick="changeImage('img/pe2.jpg')">
                    <img src="img/pe2.jpg" alt="Imagem 3" onclick="changeImage('img/pe2.jpg')">

                </div>


                <div class="selected-image">
                    <img id="featured-image" src="admin/<?php echo $produto['imagem'] ?>" alt=""> <img id="favicon" src="img/heart.svg" alt="">
                </div>

            </div>
            <div class="frete">
                <h2>Calcular frete e entrega </h2>
                <p>Calcule o frete e o prazo de entrega estimados para sua região.</p>

                <div style="position: relative; width:100%; ">
                    <label for="" style="text-align: left; position: relative;left: 0px;">
                        insira seu cep
                    </label>

                    <input type="number" style="width: 100%; height: 60px; border-radius: 20px; border:none"> <button style="position: absolute; bottom: 5px; right:10px ; height: 50px; border: none; border-radius: 20px;   background-color: #C1C1C1;
                        width: 30%;">calcular</button>

                </div>
                <a href="" id="get-cep">não sei meu cep</a>





            </div>
            <p>Normal: 4 dias úteis (Frete Grátis)
            </p>
            <p>Dúvidas? Confira a nossa Política de Frete e Entregas.
            </p>
        </div>

        <div class="container">

            <h2><?php echo $produto['nome']; ?></h2>

            <div class="stars"> <span>R$ <?php echo number_format($produto['valor'], 2, ',', '.'); ?></span> <img src="img/revstar.png" alt=""> <img src="img/revstar.png" alt=""><img src="img/revstar.png" alt=""><img src="img/revstar.png" alt=""><img src="img/revstar.png" alt=""></div>

            <div class="categorias">aaa/aaaa/aaaaa</div>

            <div>Até 10 x R$<?php echo number_format($produto['valor'], 2, ',', '.'); ?> sem juros
                Ver outras opções</div>

            <div style="display: flex; flex-direction: column; align-items: center;">

                <label for="">
                    <input id="radio1" name="tamanho" type="radio">
                    tamanhos tradicionais
                </label>
                <div id="box1" class="box-inf">
                    <h2> tamanhhos</h2>
                    <div style="display: flex; flex-wrap: wrap;height:auto; margin: 10px;">
                        <form action="" method="post">

                            <?php
                            foreach ($tamanhos as $tamanho) {
                                echo "<button class='box-btn'>$tamanho</button>";
                            }
                            ?>
                            <select name="tamanho" id="tamanho">
                                <?php
                                foreach ($tamanhos as $tamanho) {
                                    echo "<option class='box-btn' value='$tamanho'>$tamanho</option>";
                                }
                                ?>
                            </select>

                        </form>




                    </div>



                </div>


                <a href=""> tabela de medidas</a>
                <label for="">
                    <input id="radio2" name="tamanho" type="radio">
                    TAMANHO SOB MEDIDA
                </label>
                <div class="box-inf" id="box2"> bb</div>
                <a href=""> como medir</a>
            </div>

            <form action="adicionar_ao_carrinho.php" method="post">
                <input type="hidden" name="code" value="<?php echo $produto['id']; ?>">
                <button type="submit" class="btn-compra">Adicionar ao Carrinho</button>
            </form>




            <div class="product-description">
                <p><?php echo $produto['descricao']; ?>
                </p>

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
            <div class="grid-item">SOBRE A EASY FIT
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
    <script src="js/index.js"></script>

</body>

</html>