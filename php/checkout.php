
<style>
    body {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
    }

    #qrcode-container {
        text-align: center;
    }

    img {
        max-width: 100%;
        height: auto;
    }
</style>

<?php

use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;

session_start();header("Access-Control-Allow-Origin: finalizarcompra.html");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

if (!empty($_SESSION['shopping_cart'])) {
    // Conecte-se ao banco de dados
    $conexao = mysqli_connect("localhost", "root", "", "meubanco");

    if (mysqli_connect_errno()) {
        echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
        exit;
    }

    // Crie um novo pedido na tabela "pedidos"
    $id_cliente = $_SESSION['id'];
    $data_pedido = date('Y-m-d'); // Data atual
    $status_pedido = "Em Processamento"; // Pode ser ajustado conforme necessário
    $total_pedido = 0; // Será calculado abaixo
    $endereco_entrega  = "teste";
    $forma_pagamento = "pix"; //$_POST["forma_pagamento"];



    $valorFrete = 0;
    $valor_total=0;

    
    foreach ($_SESSION['shopping_cart'] as $produto_id => $quantidade) {
      
        echo$produto_id ;
        $query = "SELECT nome, valor, peso, altura, largura, comprimento FROM produtos WHERE id = $produto_id";
        $result = mysqli_query($conexao, $query);
        $produto = mysqli_fetch_assoc($result);

        $nome_produto = $produto['nome'];
        $preco_unitario = $produto['valor'];
        $peso = $produto['peso'];
        $altura = $produto['altura'];
        $largura = $produto['largura'];
        $comprimento = $produto['comprimento'];
        $quantidade = 1;
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
                $valorFrete += $responseData[0]['vlrFrete'];
                echo $valorFrete; // Assumindo que o 
            } else {
                echo "Erro na decodificação do JSON da resposta.";
            }
        }

        // Feche a sessão cURL
        curl_close($ch);
       
        $valorSfrete += $subtotal;
        
        $valor_total += $subtotal + $valorFrete;
        echo $valorSfrete, $valor_total;



    $inserir_pedido_query = "INSERT INTO pedidos (id_cliente, data_pedido, status_pedido, total_pedido, endereco_entrega, metodo_pagamento) VALUES ('$id_cliente', '$data_pedido', '$status_pedido', '$total_pedido', '$endereco_entrega', '$forma_pagamento')";
    mysqli_query($conexao, $inserir_pedido_query);

    $id_pedido = mysqli_insert_id($conexao); // Obtém o ID do pedido recém-criado


    // Percorre os produtos no carrinho e insere-os na tabela "itens_pedido"
    foreach ($_SESSION['shopping_cart'] as $produto_id => $quantidade) {
        // Recupera informações do produto
        $query_produto = "SELECT valor FROM produtos WHERE id = $produto_id";
        $result_produto = mysqli_query($conexao, $query_produto);
        $produto = mysqli_fetch_assoc($result_produto);
    
        $preco_unitario = $produto['valor'];
   
        $tamanho = isset($_SESSION['shopping_cart'][$produto_id]['tamanho']) ? $_SESSION['shopping_cart'][$produto_id]['tamanho'] : 'A';
        echo $tamanho ;
        $quantidade = 1;
        echo "  ", $preco_unitario, " ", $quantidade;
        $subtotal1 = $preco_unitario * $quantidade;
    
        // Insere o item do pedido na tabela "itens_pedido"
        $inserir_item_query = "INSERT INTO itens_pedido (id_pedido, id_produto, quantidade, preco_unitario, total_item, valor_frete, tamanho) VALUES ('$id_pedido', '$produto_id', '$quantidade', '$preco_unitario', '$subtotal1', '$valorFrete', '$tamanho')";
    
        $result_insert = mysqli_query($conexao, $inserir_item_query);

        if ($result_insert) {
            echo "Inserção bem-sucedida!";
        } else {
            echo "Erro na inserção: " . mysqli_error($conexao);
        }
    }
    

    // Atualiza o valor total do pedido na tabela "pedidos"
    $atualizar_total_query = "UPDATE pedidos SET total_pedido = '$valor_total' WHERE id_pedido = '$id_pedido'";
    mysqli_query($conexao, $atualizar_total_query);


    if ($forma_pagamento === "pix") {
        if (file_exists($autoload = realpath('D:\xampp\htdocs\TCC\gn-api-sdk-php-master\vendor\autoload.php'))) {
            require_once $autoload;
        } else {
            print_r("Autoload not found or on path <code>$autoload</code>");
        }
    
        if (file_exists($options = realpath('D:\xampp\htdocs\git_tcc\TCC\gn-api-sdk-php-master\examples\credentials\options.php'))) {
            require_once $options;
        }
    
        $txid = "000000000000000000000000000000000$id_pedido"; // Substitua pelo valor desejado
        $pattern = "^[a-zA-Z0-9]{26,35}$";
        if (!preg_match("/$pattern/", $txid)) {
            die("Erro: O campo txid não corresponde ao padrão esperado.");
        }
    
        foreach ($_SESSION['shopping_cart'] as $produto_id => $quantidade) {
            $query = "SELECT nome, valor FROM produtos WHERE id = $produto_id";
            $result = mysqli_query($conexao, $query);
            $produto = mysqli_fetch_assoc($result);
            $nome_produto = $produto['nome'];
            $preco_produto = $produto['valor'];
            $subtotal_produto = $preco_produto * 1;
    
            $infoAdicionais[] = [
                "nome" => $nome_produto,
                "valor" => (string)$subtotal_produto // Ensure that the value is cast to a string
            ];
        }
    
        $params = [
            "txid" => $txid
        ];
    
        $body = [
            "calendario" => [
                "expiracao" => 1800// Charge lifetime, specified in seconds from creation date
            ],
            "devedor" => [
                "cpf" => "50618401865",
                "nome" => "davi ribeiro"
            ],
            "valor" => [
                "original" => "0.01"
            ],
            "chave" => "93d8c857-540a-45c0-af96-17a59e9ec256",
            "solicitacaoPagador" => "Enter the order number or identifier.",
            "infoAdicionais" => $infoAdicionais
        ];
    
        try {
            $api = Gerencianet::getInstance($options);
            $pix = $api->pixCreateCharge($params, $body);
    
            if ($pix["txid"]) {
                $params = [
                    "id" => $pix["loc"]["id"]
                ];
    
                $qrcode = $api->pixGenerateQRCode($params);

                echo "  $subtotal_produto ";
                echo "<div id='qrcode-container'>";
                echo "<b>QR Code:</b>";
                echo "<img src='" . $qrcode["imagemQrcode"] . "' />";
                echo "<div id='timer'></div>"; // Container para o timer
                echo "</div>";
    
                echo "<script>
                        var timerElement = document.getElementById('timer');
                        var remainingTime = 1800; // Tempo de expiração em segundos
                        var timerInterval = setInterval(function () {
                            var minutes = Math.floor(remainingTime / 60);
                            var seconds = remainingTime % 60;
    
                            timerElement.innerHTML = 'Tempo restante: ' + minutes + 'm ' + seconds + 's';
    
                            if (remainingTime <= 0) {
                                clearInterval(timerInterval);
                                timerElement.innerHTML = 'Expirado';
                            }
    
                            remainingTime--;
                        }, 1000);
                      </script>";
            } else {
                echo "<pre>" . json_encode($pix, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . "</pre>";
            }
        } catch (GerencianetException $e) {
            print_r($e->code);
            print_r($e->error);
            print_r($e->errorDescription);
        } catch (Exception $e) {
            print_r($e->getMessage());
        }
    }
    

    
if ($forma_pagamento === "boleto") {
    

    if (file_exists($autoload = realpath('C:/xampp/htdocs/projetos/TCC/07x11/TCC/pagamentos/gn-api-sdk-php-master/vendor/autoload.php'))) {
        require_once $autoload;
    } else {
        print_r("Autoload not found or on path <code>$autoload</code>");
    }
    
    
    if (file_exists($options = realpath('C:/xampp/htdocs/projetos/TCC/07x11/TCC/pagamentos/gn-api-sdk-php-master/examples/credentials/options.php'))) {
        require_once $options;
    }
    
    
    
    
    
    
    
    
    foreach ($_SESSION['shopping_cart'] as $produto_id => $quantidade) {
        $query = "SELECT nome, preco FROM produtos WHERE id = $produto_id";
        $result = mysqli_query($conexao, $query);
        $produto = mysqli_fetch_assoc($result);
        $nome_produto = $produto['nome'];
        $preco_produto = $produto['valor'];
        $subtotal_produto = $preco_produto * $quantidade*100;
    
        $items[] = [
            "name" => $nome_produto,
            "amount" => (int)$quantidade,
            "value" => (int)$subtotal_produto // Ensure that the value is cast to a string
        ];
    }
    

    
    $shippings = [
        [
            "name" => "Shipping to City",
            "value" => 100*$valorFrete
        ]
    ];
    
    $metadata = [
        "custom_id" => "Order_$id_pedido",
        
    ];
    
    $customer = [
        "name" => "linoca sp",
        "cpf" => "94271564656",
        // "email" => "",
        // "phone_number" => "",
        // "birth" => "",
        // "address" => [
        // 	"street" => "",
        // 	"number" => "",
        // 	"neighborhood" => "",
        // 	"zipcode" => "",
        // 	"city" => "",
        // 	"complement" => "",
        // 	"state" => "",
        // 	"juridical_person" => "",
        // 	"corporate_name" => "",
        // 	"cnpj" => ""
        // ],
    ];
    
 


    $bankingBillet = [
        "expire_at" => "2024-12-10",
        "message" => "This is a space\n of up to 80 characters\n to tell\n your client something",
        "customer" => $customer

    ];
    
    $payment = [
        "banking_billet" => $bankingBillet
    ];
    
    $body = [
        "items" => $items,
        "shippings" => $shippings,
        "metadata" => $metadata,
        "payment" => $payment
    ];
    
    try {
        $api = new Gerencianet($options);
        $response = $api->createOneStepCharge($params = [], $body);
    
        print_r("<pre>" . json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . "</pre>");
    } catch (GerencianetException $e) {
        print_r($e->code);
        print_r($e->error);
        print_r($e->errorDescription);
    } catch (Exception $e) {
        print_r($e->getMessage());
    }
    
    
    
    
    
    
    
    
    
    }
    
    // Feche a conexão com o banco de dados
    mysqli_close($conexao);
    // Limpa o carrinho após a compra
    unset($_SESSION['shopping_cart']);


    

    // Redireciona o usuário para uma página de confirmação
 
} }

