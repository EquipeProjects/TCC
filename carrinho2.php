<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="css/carrinho.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <script defer src="js/index.js"></script>
</head>

<body>
    <main>
        <div class="page-title">CARRINHO DE COMPRA</div>
        <div class="content">
            <section>

                <table>
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Preço</th>
                            <th>Quantidade</th>
                            <th>Total</th>
                            <th>-</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        session_start();

                        if (!isset($_SESSION['id'])) {
                            // Se não estiver autenticado, redirecionar para a página de login
                            header('Location: ../login.php');
                            exit();
                        }

                        if (empty($_SESSION['carrinho'])) {
                            echo "Seu carrinho de compras está vazio.";
                        } else {
                            $conexao = mysqli_connect("localhost", "root", "", "linoca");

                            if (mysqli_connect_errno()) {
                                echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
                                exit;
                            }

                            $valor_total = 0;
                            $qtdpro = 0;
                        ?>

                            <div id="resultado-frete">
                                <!-- Os resultados serão adicionados aqui -->
                            </div>

                            <?php
                            foreach ($_SESSION['carrinho'] as $produto_id => $quantidade) {
                                $query = "SELECT nome, preco, peso, altura, largura, comprimento FROM produtos WHERE id = $produto_id";
                                $result = mysqli_query($conexao, $query);
                                $produto = mysqli_fetch_assoc($result);

                                $nome_produto = $produto['nome'];
                                $preco_unitario = $produto['preco'];
                                $peso = $produto['peso'];
                                $altura = $produto['altura'];
                                $largura = $produto['largura'];
                                $comprimento = $produto['comprimento'];
                                $quantidade = $_SESSION['carrinho'][$produto_id];
                                $valorMerc = $preco_unitario * $quantidade;
                                $pesoMerc = $peso * $quantidade;
                                $subtotal = $preco_unitario * $quantidade;
                                $cepOrigem = "12249899";
                                $cepDestino = "05999-999";

                                $servico = ['E', 'X', 'M', 'R'];
                                $data = array(
                                    "cepOrigem" => $cepOrigem,
                                    "cepDestino" => $cepDestino,
                                    "vlrMerc" => $valorMerc,
                                    "pesoMerc" => $pesoMerc,
                                    "produtos" =>
                                    array(
                                        "altura" => $altura,
                                        "largura" => $largura,
                                        "peso" => $peso,
                                        "comprimento" => $comprimento,
                                        "valor" => $preco_unitario,
                                        "quantidade" => $quantidade
                                    ),
                                    "servicos" => array($servico)
                                );

                                $jsonData = json_encode($data);
                                $token = "42037b390fae0c46824a99d3daea7dad";

                                // Sua URL da API
                                $apiUrl = "https://portal.kangu.com.br/tms/transporte/simular";
                                $ch = curl_init($apiUrl);
                                curl_setopt($ch, CURLOPT_POST, 1);
                                curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
                                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                                    'Content-Type: application/json',
                                    'token: ' . $token // Adicione o cabeçalho de autorização com a chave 'token'
                                ));
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                                // Execute a requisição e obtenha a resposta
                                $valorFrete = 0;
                                $valorSfrete = 0; // Adicione esta variável para armazenar o valor do frete
                                $response = curl_exec($ch);

                                if ($response === false) {
                                    echo "Erro na solicitação: " . curl_error($ch);
                                } else {
                                    // Decodifique o JSON da resposta
                                    $responseData = json_decode($response, true);

                                    // Verifique se o JSON foi decodificado com sucesso
                                    if ($responseData !== null) {


                                        // Atualize o valor do frete na página
                                        $valorFrete += $responseData[0]['vlrFrete']; // Assumindo que o 
                                    } else {
                                        echo "Erro na decodificação do JSON da resposta.";
                                    }
                                }

                                // Feche a sessão cURL
                                curl_close($ch);
                                $qtdpro += 1;

                                $_SESSION['qtdpro'] = $qtdpro;
                                $valorSfrete += $subtotal;

                                $valor_total += $subtotal + $valorFrete;

                                $imagens_query = "SELECT caminho FROM imagens WHERE produto_id = $produto_id";
                                $imagens_result = mysqli_query($conexao, $imagens_query);

                            ?>
                                <tr data-product-id='1'>
                                    <td>
                                        <div class='product'>
                                            <?php
                                            if (mysqli_num_rows($imagens_result) > 0) {
                                                $primeira_imagem = mysqli_fetch_assoc($imagens_result);
                                                echo "<img id=\"featured-image\" src=\"" . $primeira_imagem['caminho'] . "\" alt=\"Imagem do Produto\">";
                                            } else {
                                                echo "Nenhuma imagem encontrada para este produto.";
                                            }
                                            ?>
                                            <div class='info'>
                                                <div class='name'><?php echo $nome_produto; ?></div>
                                                <div class='category'>Material Escolar</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>R$ <?php echo $preco_unitario; ?></td>
                                    <td>
                                        <div class='qty'>
                                            <button class='increment'><i class='bx bx-plus'></i></button>
                                            <input type='number' value='<?php echo $quantidade; ?>' data-product-id='<?php echo $produto_id; ?>' class='quantity-input' onchange='updateQuantity(this)'>
                                            <button class='decrement'><i class='bx bx-minus'></i></button>
                                        </div>
                                    </td>
                                    <td><span class='subtotal'>R$ <?php echo $subtotal; ?></span></td>
                                    <td>
                                        <button class='remove' onclick='removeProduto(<?php echo $produto_id; ?>)'><i class='bx bx-x'></i></button>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </section>
            <aside>
                <div class="box">
                    <header>Resumo da compra</header>
                    <div class="info">
                        <div><span>Sub-total</span><span><?php echo $valorSfrete ?></span></div>
                        <div><span>Frete</span><span>
                                <!-- O valor do frete será atualizado via JavaScript -->
                                R$ <span id="valor-frete"><?php echo $valorFrete ?></span>
                            </span></div>
                        <div>
                            <button>
                                Adicionar cupom de desconto
                                <i class="bx bx-right-arrow-alt"></i>
                            </button>
                        </div>
                    </div>
                    <footer>
                        <span>Total</span>
                        <span id="valor-total">
                            <?php echo $valor_total; ?>
                        </span>


                    </footer>

                </div>

                <div id="popup" class="popup">
    <div class="popup-conteudo">
        <span class="fechar" onclick="fecharPopup()">&times;</span>
        <!-- Adicione aqui o formulário de endereço e opções de pagamento -->
        <!-- Exemplo: -->
        <iframe src="finalizarcompra.html" style="width: 100%;" frameborder="0"></iframe>
        <form action="processar_pedido.php" method="post">
            <!-- Campos do endereço -->
            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco" required>

            <!-- Opções de pagamento -->
            <label for="forma_pagamento">Escolha a forma de pagamento:</label>
            <select id="forma_pagamento" name="forma_pagamento" required>
                <option value="pix">Cartão de Crédito</option>
                <option value="boleto">Boleto Bancário</option>
            </select>
            <input type="hidden" name="valr_fre" value="<?php echo $valorFrete ?>">
            <!-- Botão para enviar o pedido -->
            <button type="submit">Confirmar Pedido</button>
        </form>
    </div>
</div>


                <form >

                   
                <button type="button" onclick="abrirPopup()">Finalizar Compra</button>

                   
                </form>

            </aside>
        </div>
    </main>


    <script>
    function fecharPopup() {
        // Obtém a referência do popup
        var popup = document.getElementById('popup');

        // Oculta o popup
        popup.style.display = 'none';
    }
</script>
<script>
    function abrirPopup() {
        // Obtém a referência do popup
        var popup = document.getElementById('popup');

        // Exibe o popup
        popup.style.display = 'block';
    }
</script>


    <script>
        function calcularFrete() {
            var produtos = <?php echo json_encode($_SESSION['carrinho']); ?>;
            var cepDestino = document.getElementById("cep").value;
            var menorFrete = null;
            var resultadoFreteDiv = document.getElementById("resultado-frete");

            resultadoFreteDiv.innerHTML = ""; // Limpa o conteúdo anterior

            for (var produtoId in produtos) {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "carrinho.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var resultado = JSON.parse(xhr.responseText); // Defina a variável 'resultado' aqui

                        // Restante do código para exibir resultados
                        var resultadoHtml = "Serviço: " + resultado['servico'] + "<br>" +
                            "Nome do Transportador: " + resultado['transp_nome'] + "<br>" +
                            "Valor do Frete: R$ " + resultado['vlrFrete'] + "<br>" +
                            "Prazo de Entrega: " + resultado['prazoEnt'] + " dia(s)<br>" +
                            "Descrição: " + resultado['descricao'] + "<br>" +
                            "==============================<br>";

                        // Adicione o resultado à div de resultados
                        resultadoFreteDiv.innerHTML += resultadoHtml;
                    }
                };

                // Construir os dados do produto e do CEP para a solicitação
                var data = "produto_id=" + produtoId + "&quantidade=" + produtos[produtoId] + "&cep_destino=" + cepDestino;
                xhr.send(data);
            }
        }
    </script>
    <script>
        function updateQuantity(inputField) {
            var newQuantity = parseInt(inputField.value, 10);
            var productId = inputField.getAttribute('data-product-id');

            if (!isNaN(newQuantity) && newQuantity > 0) {
                // Enviar uma solicitação AJAX para atualizar a sessão
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "atualizar_sessao.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // Atualização da sessão concluída com sucesso
                        // Você pode adicionar qualquer manipulação adicional aqui, se necessário
                    }
                };
                xhr.send("quantity=" + newQuantity + "&product_id=" + productId);

                // Atualizar o subtotal do produto
                var productRow = inputField.closest('tr');
                var priceCell = productRow.querySelector('td:nth-child(2)');
                var subtotalCell = productRow.querySelector('td:nth-child(4)');
                var price = parseFloat(priceCell.innerText.replace("R$ ", ""));
                var newSubtotal = price * newQuantity;
                subtotalCell.innerText = "R$ " + newSubtotal.toFixed(2);

                // Atualizar o valor total do carrinho
                var totalCell = document.querySelector("#valor-total");
                var currentTotal = parseFloat(totalCell.innerText.replace("R$ ", ""));
                var oldQuantity = parseInt(inputField.defaultValue, 10); // Obter a quantidade anterior
                var difference = (newSubtotal - (price * oldQuantity)) || 0; // Garantir que a diferença seja numérica
                var newTotal = currentTotal + difference;
                totalCell.innerText = "R$ " + newTotal.toFixed(2);

                // Atualizar a quantidade padrão do input para a nova quantidade
                inputField.defaultValue = newQuantity;
            } else {
                // Caso a nova quantidade seja inválida, você pode lidar com isso da maneira adequada, por exemplo, definindo a quantidade padrão de volta para o valor anterior ou mostrando uma mensagem de erro.
                inputField.value = inputField.defaultValue;
                alert("Quantidade inválida.");
            }
        }

        function removeProduto(productId) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "remover_produto.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Atualizar a página após a remoção do produto
                    window.location.reload();
                }
            };
            xhr.send("product_id=" + productId);
        }
    </script>


</body>

</html>