<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Empresa</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="/ico/logo.ico" type="image/x-icon">
    <meta name="author" content="João Victor, Davi Ribeiro e Yzabella Luiza">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="description" content="Cadastre sua empresa na Easyfit.">
</head>

<body>
    <h2>Cadastro de Empresa</h2>
    <form method="post" action="processar_cadastro_empresa.php">
        <input type="text" name="nome" placeholder="Nome" required><br>
        <input type="text" name="sobrenome" placeholder="Sobrenome" required><br>
        <input type="text" name="cnpj" placeholder="CNPJ" required><br>
        <input type="text" name="razaosocial" placeholder="Razão Social" required><br>
        <input type="text" name="inscricaoestadual" placeholder="Inscrição Estadual" required><br>
        <input type="text" name="telefone" placeholder="Telefone" required><br>
        <input type="text" name="cep" placeholder="CEP" required><br>
        <input type="text" name="endereco" placeholder="Endereço" required><br>
        <input type="text" name="numero" placeholder="Número" required><br>
        <input type="text" name="complemento" placeholder="Complemento"><br>
        <input type="text" name="bairro" placeholder="Bairro" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="senha" placeholder="Senha" required><br>
        <input type="text" name="estado" placeholder="Estado" required><br>
        <input type="submit" value="Cadastrar">
    </form>
</body>

</html>
<?php
// Conexão com o banco de dados
$mysqli = new mysqli("localhost", "root", "", "sistema_login");

// Verifica se a conexão foi bem-sucedida
if ($mysqli->connect_error) {
    die("Erro de conexão: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe dados do formulário
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $cnpj = $_POST["cnpj"];
    $razaosocial = $_POST["razaosocial"];
    $inscricaoestadual = $_POST["inscricaoestadual"];
    $telefone = $_POST["telefone"];
    $cep = $_POST["cep"];
    $endereco = $_POST["endereco"];
    $numero = $_POST["numero"];
    $complemento = $_POST["complemento"];
    $bairro = $_POST["bairro"];
    $email = $_POST["email"];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);
    $estado = $_POST["estado"];

    // Preparar e executar a inserção no banco de dados
    $sql = "INSERT INTO empresa (nome, sobrenome, cnpj, razaosocial, ins_cestadual, telefone, cep, endereco, numero, complemento, bairro, email, senha, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssisissississs", $nome, $sobrenome, $cnpj, $razaosocial, $inscricaoestadual, $telefone, $cep, $endereco, $numero, $complemento, $bairro, $email, $senha, $estado);

    if ($stmt->execute()) {
        // Cadastro bem-sucedido, redireciona para a página de login ou outra página desejada
        header("Location: login.php");
        exit();
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    $stmt->close();
}

$mysqli->close();
?>