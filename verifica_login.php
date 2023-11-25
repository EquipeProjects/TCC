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
 // Conexão com o banco de dados

// Receba os dados do formulário
$username = $_POST['username'];
$password = $_POST['password'];

// Verifique se é um cliente
$query = "SELECT * FROM clientes WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    $_SESSION['tipo_usuario'] = 'cliente';
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

// Se não corresponder a nenhum tipo de usuário, exiba uma mensagem de erro
echo "Credenciais inválidas. Por favor, tente novamente.";
?>
