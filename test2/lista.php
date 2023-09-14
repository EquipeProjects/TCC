<!DOCTYPE html>
<html>
<head>
    <title>Lista de Produtos</title>
</head>
<body>
    <h1>Lista de Produtos</h1>
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

    // Consulta para obter todos os produtos
    $sql = "SELECT id, nome, valor, imagem FROM produtos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<img src='" . $row['imagem'] . "' alt='" . $row['nome'] . "'><br>";
            echo "Nome: " . $row['nome'] . "<br>";
            echo "Valor: " . $row['valor'] . "<br>";
            echo "<a href='produto.php?id=" . $row['id'] . "'>Ver detalhes</a>";
            echo "</div>";
        }
    } else {
        echo "Nenhum produto cadastrado.";
    }

    $conn->close();
    ?>
</body>
</html>
