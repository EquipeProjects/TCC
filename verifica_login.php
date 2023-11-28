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
$query1 = "SELECT * FROM vendedores WHERE username = '$username' AND password = '$password'";
$result1 = mysqli_query($conn, $query1);

if (mysqli_num_rows($result) == 1) {
    // Obtenha os dados da linha (registro)
    $row = mysqli_fetch_assoc($result);

    // Preencha as variáveis de sessão
    $_SESSION['tipo_usuario'] = 'cliente';
    $_SESSION['id'] = $row['id']; // Substitua 'id' pelo nome real do campo ID no seu banco de dados

    // Redirecione para a página do cliente
    header('Location: index.php');
    exit();
}

else if (mysqli_num_rows($result1) == 1) {
    // Obtenha os dados da linha (registro)
    $row = mysqli_fetch_assoc($result1);

    // Preencha as variáveis de sessão
    $_SESSION['tipo_usuario'] = 'vendedor';
    $_SESSION['id'] = $row['id']; // Substitua 'id' pelo nome real do campo ID no seu banco de dados

    // Redirecione para a página do cliente
    header('Location: admin/');
    exit();
}

// Se não corresponder a nenhum tipo de usuário, retorne uma mensagem de erro em JSON
$error_message = [
    "error" => [
        "message" => "Credenciais inválidas. Por favor, tente novamente.",
        "code" => "INVALID_CREDENTIALS"
    ]
];

// Armazene a mensagem de erro na sessão
$_SESSION['error_message'] = $error_message;

// Redirecione de volta para a página de login
header('Location: login.php');
exit();
?>
</body>
</html>
