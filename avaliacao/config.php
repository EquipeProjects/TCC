<?php
// Configurações de conexão ao banco de dados
$hostname = "localhost";
$username = "root";
$password = "";
$database = "sistema_login";

// Conectar ao banco de dados
$mysqli = new mysqli($hostname, $username, $password, $database);

// Verificar a conexão
if ($mysqli->connect_error) {
    die("Erro na conexão: " . $mysqli->connect_error);
}
?>
