<?php
// Realize consultas ao banco de dados para obter informações
// Substitua as consultas e valores simulados pelos reais

$data = array(
    'media' => 4.3, // Substitua pela média real de classificações
    'totalAvaliacoes' => 50, // Substitua pelo total real de avaliações
    'percentual' => array(
        1 => 10, // Substitua pelos percentuais reais de cada classificação
        2 => 20,
        3 => 15,
        4 => 25,
        5 => 30,
    ),
);

header('Content-Type: application/json');
echo json_encode($data);
?>
