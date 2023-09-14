<?php
// Conexão com o banco de dados
$mysqli = new mysqli("localhost", "root", "", "sistema_login");

// Verifica se a conexão foi bem-sucedida
if ($mysqli->connect_error) {
    die("Erro de conexão: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe dados do formulário
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email_or_phone = $_POST["email_or_phone"];

    // Verifica se um valor foi fornecido para o campo email ou telefone
    if (!empty($email_or_phone)) {
        // Validação do email (caso seja um email)
        if (filter_var($email_or_phone, FILTER_VALIDATE_EMAIL)) {
            // Inserção dos dados na tabela 'usuarios' com email
            $sql = "INSERT INTO usuarios (username, password, email) VALUES (?, ?, ?)";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("sss", $username, $password, $email_or_phone);

            if ($stmt->execute()) {
                // Redireciona o usuário para uma página externa após o cadastro bem-sucedido
                header("Location: dashboard_user.php");
                exit();
            } else {
                echo "Erro ao cadastrar: " . $stmt->error;
            }

            $stmt->close();
        } else {
            // Inserção dos dados na tabela 'usuarios' com telefone (caso não seja um email)
            $sql = "INSERT INTO usuarios (username, password, phone) VALUES (?, ?, ?)";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("sss", $username, $password, $email_or_phone);

            if ($stmt->execute()) {
                // Redireciona o usuário para uma página externa após o cadastro bem-sucedido
                header("Location: dashboard_user.php");
                exit();
            } else {
                echo "Erro ao cadastrar: " . $stmt->error;
            }

            $stmt->close();
        }
    } else {
        echo "Você deve fornecer um email ou um telefone.";
    }
}

$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro</title>
</head>
<body>
    <h2>Cadastro</h2>
    <form method="post" action="cadastro_user.php">
        <label for="username">Nome de Usuário:</label>
        <input type="text" name="username" required><br>

        <label for="password">Senha:</label>
        <input type="password" name="password" required><br>

        <label for="email_or_phone">Email ou Telefone:</label>
        <input type="text" name="email_or_phone" required><br>

        <input type="submit" value="Cadastrar1">
    </form>
</body>
</html>
