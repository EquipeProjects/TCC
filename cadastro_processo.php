<?php
session_start();
// Conexão com o banco de dados
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
$nome = $_POST['nome'];
$email = $_POST['email'];
$tipo_usuario = $_POST['tipo_usuario'];

// Verifique se o nome de usuário já está em uso
$check_username_query = "SELECT * FROM clientes WHERE username = '$username' OR (SELECT username FROM vendedores WHERE username = '$username')";
$result = mysqli_query($conn, $check_username_query);

if (mysqli_num_rows($result) > 0) {
    echo "Nome de usuário já em uso. Por favor, escolha outro.";
} else {
    // Insira os dados no banco de dados
    if ($tipo_usuario == 'cliente') {
        $insert_query = "INSERT INTO clientes (username, password, nome, email, tipo_usuario) VALUES ('$username', '$password', '$nome', '$email', '$tipo_usuario')";
        
        if (mysqli_query($conn, $insert_query)) {
            // Redirecione para a página index do cliente após o cadastro bem-sucedido
            header("Location: index.php");
            exit(); // Certifique-se de que o script pare de ser executado após o redirecionamento
        } else {
            echo "Erro ao cadastrar usuário. Por favor, tente novamente.";
        }
    } else if ($tipo_usuario == 'vendedor') {
        $insert_query = "INSERT INTO vendedores (username, password, nome, email, tipo_usuario) VALUES ('$username', '$password', '$nome', '$email', '$tipo_usuario')";
        
        if (mysqli_query($conn, $insert_query)) {
            // Redirecione para a página de login do vendedor após o cadastro bem-sucedido
            header("Location: login.php");
            exit(); // Certifique-se de que o script pare de ser executado após o redirecionamento
        } else {
            echo "Erro ao cadastrar usuário. Por favor, tente novamente.";
        }
    }
}
?>
