<!DOCTYPE html>
<html>
<head>
    <title>Detalhes do Produto</title>
</head>
<body>
    <?php
    // Conexão com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "meubanco";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Obter o ID do produto da URL
    $id = $_GET['id'];

    // Consulta para obter os detalhes do produto com base no ID
    $sql = "SELECT nome, valor, descricao, imagem FROM produtos WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h1>" . $row['nome'] . "</h1>";
        echo "<img src='" . $row['imagem'] . "' alt='" . $row['nome'] . "'><br>";
        echo "Valor: " . $row['valor'] . "<br>";
        echo "Descrição: " . $row['descricao'];
    } else {
        echo "Produto não encontrado.";
    }

    $conn->close();
    ?>
</body>
</html>
