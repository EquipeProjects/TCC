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
        $sql = "SELECT id FROM usuarios WHERE email = ?";
        $field = "email";
    } elseif (preg_match("/^[0-9]{10}$/", $emailOrPhone)) {
        // O campo "emailOrPhone" é um número de telefone válido (10 dígitos)
        $sql = "SELECT id FROM usuarios WHERE phone = ?";
        $field = "phone";
    } else {
        // O campo "emailOrPhone" não é um email válido nem um número de telefone válido
        echo "Email ou telefone inválido.";
        exit; // Saia do script, pois não é possível continuar com dados inválidos.
    }

    // Verifica se o usuário já existe no banco de dados
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $emailOrPhone);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "Este usuário já existe.";
    } elseif ($password !== $reppassword) {
        echo "As senhas não coincidem.";
    } else {
        // Insere o novo usuário no banco de dados
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $insert_sql = "INSERT INTO usuarios (username, subname, $field, password) VALUES (?, ?, ?, ?)";
        $insert_stmt = $mysqli->prepare($insert_sql);
        $insert_stmt->bind_param("ssss", $username, $subname, $emailOrPhone, $hashed_password);
        if ($insert_stmt->execute()) {
            echo "Registro bem-sucedido! Agora você pode fazer login.";
        } else {
            echo "Erro ao registrar o usuário.";
        }
        $insert_stmt->close();
    }

    $stmt->close();
}

$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
</head>
<body>
    <h2>Registro</h2>
    <form method="post" action="registro.php">
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
        
        <input type="submit" value="Registrar">
    </form>
</body>
</html>
