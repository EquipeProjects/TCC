<?php
// Conexão com o banco de dados
$mysqli = new mysqli("localhost", "root", "", "sistema_login");

// Verifica se a conexão foi bem sucedida
if ($mysqli->connect_error) {
    die("Erro de conexão: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe dados do formulário
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Insere os dados na tabela 'usuarios'
    $sql = "INSERT INTO usuarios (username, password) VALUES (?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss", $username, $password);}

    if ($stmt->execute()) {
        echo "Cadastro realizado com sucesso!";
 
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }
// Após inserir os dados do usuário na tabela 'usuarios'
if ($stmt->execute()) {
    // Obtém o ID do usuário recém-cadastrado
    $id_usuario = $stmt->insert_id;

    // Inicia a sessão
    session_start();

    // Define as variáveis de sessão para o usuário recém-cadastrado
    $_SESSION["id"] = $id_usuario;
    $_SESSION["username"] = $username;
    $_SESSION["tipo"] = $tipo;

    // Redireciona o usuário para o dashboard
    header("Location: dashboard.php");
    exit();
} else {
    echo "Erro ao cadastrar: " . $stmt->error;
}

$stmt->close();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Cadastro</title>
</head>
<body>
    <h2>Cadastro</h2>
    <form method="post" action="cadastro.php">
        <label for="username">Nome de Usuário:</label>
        <input type="text" name="username" required><br>

        <label for="password">Senha:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
