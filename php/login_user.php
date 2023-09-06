<?php
session_start();

// Conexão com o banco de dados
$mysqli = new mysqli("localhost", "root", "", "sistema_login");

// Verifica se a conexão foi bem sucedida
if ($mysqli->connect_error) {
    die("Erro de conexão: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe dados do formulário
    $username = $_POST["username"];
    $subname = $_POST["subname"];
    $emailOrPhone = $_POST["emailOrPhone"]; // Alterei o nome do campo para "emailOrPhone"
    $password = $_POST["password"];
    $reppassword = $_POST["reppassword"];

    // Verifica se o campo "emailOrPhone" é um email válido ou um número de telefone válido
    if (filter_var($emailOrPhone, FILTER_VALIDATE_EMAIL)) {
        // O campo "emailOrPhone" é um email válido
        $sql = "SELECT id, username, subname, email, phone, password FROM usuarios WHERE email = ?";
        $field = "email";
    } elseif (preg_match("/^[0-9]{10}$/", $emailOrPhone)) {
        // O campo "emailOrPhone" é um número de telefone válido (10 dígitos)
        $sql = "SELECT id, username, subname, email, phone, password FROM usuarios WHERE phone = ?";
        $field = "phone";
    } else {
        // O campo "emailOrPhone" não é um email válido nem um número de telefone válido
        echo "Email ou telefone inválido.";
        exit; // Saia do script, pois não é possível continuar com dados inválidos.
    }

    // Consulta o banco de dados para encontrar o usuário
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $emailOrPhone);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $username, $subname, $email, $phone, $hashed_password);
        if ($stmt->fetch() && password_verify($password, $hashed_password)) {
            // Verifica se as senhas são iguais
            if ($password == $reppassword) {
                $_SESSION["id"] = $id;
                $_SESSION["username"] = $username;
                header("Location: dashboard.php"); // Redirecionar para a página de dashboard
            } else {
                echo "As senhas não coincidem.";
            }
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Usuário não encontrado.";
    }

    $stmt->close();
}

$mysqli->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="login.php">
        <label for="username">Nome:</label>
        <input type="text" name="username" required><br>

        <label for="subname">Sobrenome:</label>
        <input type="text" name="subname" required><br>

        <label for="emailOrPhone">Email ou telefone:</label>
        <input type="text" name="emailOrPhone" required><br>

        <label for="password">Senha:</label>
        <input type="password" name="password" required><br>

        <label for="reppassword">Repita a senha:</label>
        <input type="password" name="reppassword" required><br>
        

        <input type="submit" value="Entrar">
    </form>
</body>
</html>
