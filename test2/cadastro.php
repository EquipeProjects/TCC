<?php
// Conexão com o banco de dados (substitua com suas próprias informações)
$servername = "seuservidor";
$username = "seuusuario";
$password = "suasenha";
$dbname = "seubanco";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifique a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Recupere os valores do array
$itens = $_POST['itens'];

// Itere sobre os valores e insira-os no banco de dados
foreach ($itens as $item) {
    $sql = "INSERT INTO sua_tabela (nome_coluna) VALUES ('$item')";
    
    if ($conn->query($sql) !== TRUE) {
        echo "Erro ao inserir item: " . $conn->error;
    }
}

// Feche a conexão com o banco de dados
$conn->close();
?>
