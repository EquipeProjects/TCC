<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "meubanco";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Receba os dados do formulário
$username = $_POST['username'];
$password = $_POST['password'];

// Verifique se é um cliente
$query = "SELECT * FROM clientes WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    $_SESSION['tipo_usuario'] = 'cliente';
    $_SESSION['id'] = '1';
    
    header('Location: index.php'); // Redirecione para a página do cliente
    exit();
}

// Verifique se é um vendedor
$query = "SELECT * FROM vendedores WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    $_SESSION['tipo_usuario'] = 'vendedor';
    header('Location: admin/'); // Redirecione para a página do vendedor
    exit();
}

// Se não corresponder a nenhum tipo de usuário, retorne uma mensagem de erro em JSON
$error_message = [
    "error" => [
        "message" => "Credenciais inválidas. Por favor, tente novamente.",
        "code" => "INVALID_CREDENTIALS"
    ]
];

header('Content-Type: application/json');
echo json_encode($error_message);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<!-- Seu conteúdo HTML aqui -->

<<script>
    // Processar a resposta JSON no lado do cliente
    fetch('login.php', {
        method: 'POST',
        body: new FormData(document.forms[0]), // Enviar dados do formulário
    })
    .then(response => response.json())
    .then(data => {
        // Exibir a mensagem de erro como um pop-up de notificação
        if (data.error) {
            alert(data.error.message);

            // Voltar para a página anterior
            window.history.back();

            // Ou, você pode redirecionar automaticamente após alguns segundos
            // setTimeout(() => {
            //     window.location.href = "/"; // Redirecione para a página desejada
            // }, 5000); // 5000 milissegundos = 5 segundos
        }
    })
    .catch(error => console.error('Erro:', error));
</>


</body>
</html>
