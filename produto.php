<style>
    .rating {
        display: inline-block;
        font-size: 24px;
        cursor: pointer;
    }

    .rating span {
        color: gray;
        padding: 5px;
    }

    .rating span.active {
        color: gold;}
    .ratin {
        display: inline-block;
        font-size: 24px;
        cursor: pointer;
    }

    .ratin span {
        color: gray;
        padding: 5px;
    }
    

    .ratin span.active,.amarelo {
        color: gold;
    }
</style><?php
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
        $sql_categoria = "SELECT categorias.nome AS nome_categoria FROM produtos
        INNER JOIN categorias ON produtos.categoria_id = categorias.id
        WHERE produtos.id = $produto_id";
$result_categoria = $conn->query($sql_categoria);

if ($result_categoria->num_rows > 0) {
    while ($row_categoria = $result_categoria->fetch_assoc()) {
      $categoria= $row_categoria["nome_categoria"];
    }
} else {
    echo "Produto não encontrado.";
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

        $imagens_query = "SELECT caminho FROM imagens_produto WHERE produto_id = $produto_id";
        $result_imagens = mysqli_query($conn, $imagens_query);

        


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
    <script src="https://cdn.rawgit.com/RobinHerbots/Inputmask/5.x/dist/jquery.inputmask.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="description" content="Um web site de vendas de roupas sob medida que adequa qualquer corpo,gosto e estilo.">
</head>

<body>
    <?php
    include('php/header.php'); // Inclui o cabeçalho
    ?>

    <main style="background-color: rgb(217, 217, 216,0.5); width: 100%;">

        <div class="container">
            <div style="display: flex;  height: 50px;">
                <a href="#" style="justify-content: center;align-items: center; text-decoration:none"><img src="img/bag.png" style="width: 50px; text-decoration:none " alt="">
                    <div style="color:white; font-size:23px; text-decoration:none; position:relative; bottom: 9px;">Loja Easy fit</div>
                    <img src="img/seta-direita.png" style="width: 50px; text-decoration:none; position:relative; bottom: 39px; left: 84px" alt="">
                </a>

            </div>
            <div class="product-details">
                <div class="product-images">

                    <img src="admin/<?php echo $produto['imagem'] ?>" alt="Imagem 1" onclick="changeImage('admin/<?php echo $produto['imagem'] ?>')">


                    <?php
                    // Consulta SQL para obter as imagens secundárias associadas a este produto

                    if (mysqli_num_rows($result_imagens) > 0) {
                        while ($row = mysqli_fetch_assoc($result_imagens)) {
                            $caminho_imagem = $row['caminho'];
                            // Exibir a imagem secundária
                            echo "<img src='admin/$caminho_imagem' alt='Imagem secundária' onclick='changeImage(\"admin/$caminho_imagem\")'>";
                        }
                    }

                    ?>
                </div>


                <div class="selected-image">
                    <img id="featured-image" src="admin/<?php echo $produto['imagem'] ?>" alt=""> <img id="favicon" src="img/heart.svg" alt="">
                </div>

            </div>





            <div class="frete">
                <h2>Calcular frete e entrega </h2>
                <p>Calcule o frete e o prazo de entrega estimados para sua região.</p>
                <form id="form-calculo-frete" action="calcula-frete.php" method="post">
                    <div style="position: relative; width:100%; ">
                        <input type="hidden" name="peso" value="<?php echo $produto['peso']; ?>">
                        <input type="hidden" name="cep-origem" value="05999-999">
                        <input type="hidden" name="vlrmercado" value="<?php echo $produto['valor']; ?>">
                        <input type="hidden" name="altura" value="<?php echo $produto['altura']; ?>">
                        <input type="hidden" name="comprimento" value="<?php echo $produto['comprimento']; ?>">
                        <input type="hidden" name="largura" value="<?php echo $produto['largura']; ?>">
                        <input type="hidden" name="valor" value="<?php echo $produto['valor']; ?>">
                        <input type="hidden" name="quantidade" value="1">
                        <input type="hidden" name="servico" value="E">
                        <label for="" style="text-align: left; position: relative;left: 0px;">
                            insira seu cep
                        </label>
                        <input type="text" id="cep" name="cep_destino" placeholder="" required style="width: 100%; height: 60px; border-radius: 20px; border:none"> <button style="position: absolute; bottom: 5px; right:10px ; height: 50px; border: none; border-radius: 20px;   background-color: #C1C1C1;
width: 30%;">Calcular</button>
                </form>
                <script>
                    document.getElementById('cep').addEventListener('input', function(e) {
                        let value = e.target.value;
                        value = value.replace(/\D/g, ''); // Remove caracteres não numéricos
                        if (value.length > 5) {
                            value = value.replace(/^(\d{5})(\d{0,3}).*/, '$1-$2'); // Aplica a máscara XXXXX-XXX
                        }
                        e.target.value = value;
                    });
                    document.getElementById('form-calculo-frete').addEventListener('submit', function(event) {
                        event.preventDefault();

                        var formData = new FormData(this);

                        $.ajax({
                            type: "POST",
                            url: "calcula-frete.php",
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(data) {
                                var resultadoFrete = document.getElementById('resultado-frete');
                                resultadoFrete.innerHTML = '';

                                // Transforma a string JSON em um objeto JavaScript
                                var resultados = JSON.parse(data);

                                resultados.forEach(function(resultado, index) {
                                    resultadoFrete.innerHTML += `
            <div class="resultado-frete-item">
                <h3>Serviço: ${resultado['Serviço']}</h3>
                <p>Transportador: ${resultado['Nome do Transportador']}</p>
                <p>Valor do Frete: ${resultado['Valor do Frete']}</p>
                <p>Prazo de Entrega: ${resultado['Prazo de Entrega']}</p>
                <p>Descrição: ${resultado['Descrição']}</p>
            </div>
            `;

                                    // Adicione estilos CSS para a classe 'resultado-frete-item' conforme necessário
                                });
                            },
                            error: function(error) {
                                console.error(error);
                            }

                        });
                    });
                </script>


            </div>
            <a href="#" id="get-cep">Não sei meu cep</a>
            <div id="resultado-frete"></div>





        </div>

        </div>


        

        <div class="container">

            <h2><?php echo $produto['nome']; ?></h2>
<!-- Formulário de Avaliação -->
<div id="avaliacao-container">
    <div class="stars ratin" onclick="mostrarFormulario()">
    <?php
    // Código para calcular a média das avaliações no PHP e exibir as estrelas
    $produto_id = intval($_GET['id']);
    $sql_avaliacoes = "SELECT AVG(avaliacao) as media FROM avaliacoes WHERE produto_id = $produto_id";
    $result_avaliacoes = $conn->query($sql_avaliacoes);

    if ($result_avaliacoes->num_rows > 0) {
        $row_avaliacoes = $result_avaliacoes->fetch_assoc();
        $media_avaliacoes = $row_avaliacoes['media'];
        echo number_format($media_avaliacoes, 1);

        for ($i = 1; $i <= 5; $i++) {
            if ($i <= round($media_avaliacoes)) {
                echo "<span class='active'>&#9733;</span>";
            } else {
                echo "<span>&#9733;</span>";
            }
        }
    }
    

    ?>
    </div>

    <!-- Formulário de Avaliação -->
    
    <!-- Container para Avaliações Existente -->
    
</div>

            <!-- Exibir Estrelas e Média das Avaliações -->
            <div class="stars ratin">
    
    
</div>

            <!-- Formulário de Avaliação -->
            <form id="form-avaliacao">
              
            </form>
            <div class="categorias"><?php echo $categoria; ?>/<?php echo $produto['subcategoria']; ?>/<?php echo $produto['nome']; ?></div>

            <div>Até 10 x R$<?php echo number_format($produto['valor'], 2, ',', '.'); ?> sem juros
                Ver outras opções</div>

            <div style="display: flex; flex-direction: column; align-items: center;">

            <form style="display: flex; flex-direction: column; align-items: center;" action="adicionar_ao_carrinho.php" method="post">
                <label for="">
                    <input id="radio1"  type="radio">
                    TAMANHO TRADICIONAIS
                </label>
                <div id="box1" class="box-inf">
                    <h2> Tamanhos</h2>
                    <div style="display: flex; flex-wrap: wrap;height:auto; margin: 10px;">
                    
                       

                            <?php
                            
                            foreach ($tamanhos as $tamanho) {
                                echo "<button class='box-btn'>$tamanho</button>";
                            }

                         
                            ?>

                        





                    </div>



                </div>


                <a href="#"> Tabela de medidas</a>
                <label for="">
                    <input id="radio2" name="tamanho" type="radio">
                    TAMANHO SOB MEDIDA
                </label>
                <div class="box-inf" id="box2">
                <label for="altura_personalizada">Busto:</label>
    <input id="altura_personalizada" name="altura_personalizada" type="text" placeholder="Altura">
<br>
    <label for="largura_personalizada">Tórax:</label>
    <input id="largura_personalizada" name="largura_personalizada" type="text" placeholder="Largura">
<br>
    <label for="comprimento_personalizado">Cintura:</label>
    <input id="comprimento_personalizado" name="comprimento_personalizado" type="text" placeholder="Comprimento">
                </div>
                <a href="#"> Como medir</a>
            </div>

            <!-- Adicione este script à sua página -->
 







                <input type="hidden" name="code" value="<?php echo $produto['id']; ?>">

                <button type="submit" class="btn-compra">Adicionar ao Carrinho</button>
            </form>




            <div style="font-size:30px;
            display:flex;
            align-items:center;text-align:center;
            margin:30px">
                <?php echo $produto['descricao']; ?>


            </div>




        </div>




    </main>


    <form id="form-avaliacao" style="display: flex; flex-direction: column; align-items: center;">
    <label for="avaliacao">Avaliação:</label>
    <div class="rating" onclick="selecionarEstrela(event)">
        <span>&#9733;</span>
        <span>&#9733;</span>
        <span>&#9733;</span>
        <span>&#9733;</span>
        <span>&#9733;</span>
    </div>

    <label for="comentario">Comentário:</label>
    <textarea name="comentario" id="comentario"></textarea>

    <button type="button" onclick="enviarAvaliacao()">Enviar Avaliação</button>
</form>

<!-- Avaliações Existente -->
<div id="avaliacoes-existentes" style="font-size: 10px; align-items: center; text-align: center; margin: 10px;">
    <!-- Conteúdo das Avaliações Existente será carregado via AJAX -->
</div>
    <?php
    include('php/footer.php');


    ?>
    <script src="js/index.js"></script>
    <script>
 document.addEventListener("DOMContentLoaded", function() {
    var formulario = document.getElementById('form-avaliacao');
    formulario.style.display = 'flex';

    // Carregue as avaliações existentes
    carregarAvaliacoesExistentes();
});
function carregarAvaliacoesExistentes() {
    // Use AJAX para buscar avaliações existentes do servidor
    $.ajax({
        type: 'GET',
        url: 'carregar_avaliacoes.php?id=<?php echo $produto['id'];?> ', // Substitua pelo seu script que carrega avaliações do servidor
        success: function (avaliacoes) {
            // Exiba as avaliações existentes na div 'avaliacoes-existentes'
            var avaliacoesExistentes = document.getElementById('avaliacoes-existentes');
            avaliacoesExistentes.innerHTML = avaliacoes;
        },
        error: function (error) {
            console.error('Erro ao carregar avaliações:', error);
        }
    });
}

        function selecionarEstrela(event) {
            const estrelas = document.querySelectorAll('.rating span');
            const estrelaClicada = event.target;

            estrelas.forEach((estrela, index) => {
                if (estrela === estrelaClicada || estrela.contains(estrelaClicada)) {
                    for (let i = 0; i <= index; i++) {
                        estrelas[i].classList.add('active');
                    }
                    for (let i = index + 1; i < estrelas.length; i++) {
                        estrelas[i].classList.remove('active');
                    }
                }
            });
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.rawgit.com/RobinHerbots/Inputmask/5.x/dist/jquery.inputmask.min.js"></script>
    <script>
        function enviarAvaliacao() {
            console.log('Function called');
            var avaliacao = document.querySelectorAll('.rating span.active').length;
            console.log('Avaliacao:', avaliacao);
            var comentario = document.getElementById('comentario').value;
            var id = <?php echo $produto_id;
                        $conn->close() ?>;


            // Enviar dados para o servidor usando AJAX
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'processa_avaliacao.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Atualizar a página ou realizar outras ações após o envio da avaliação
                    location.reload();
                }
            };
            xhr.send('avaliacao=' + avaliacao + '&comentario=' + comentario + '&produto_id=' + id);
        }
    </script>
   
</body>

</html>