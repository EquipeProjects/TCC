<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "meubanco";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// ID da categoria correspondente a esta página (modificar conforme necessário)
$categoria_id = 1; // Por exemplo, para a página "eletronicos.php"

// Consulta SQL para selecionar produtos da categoria correspondente
$sql = "SELECT id, nome, valor, imagem FROM produtos WHERE categoria_id = $categoria_id";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "
            <div>
                <br>
                Nome: {$row['nome']}<br>
                Valor: {$row['valor']}<br>
                <!-- Adicione outros detalhes do produto conforme necessário -->
            </div>
        ";
    }
} else {
    echo "Nenhum produto nesta categoria.";
}



?>