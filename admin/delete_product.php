<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "meubanco";
$conn = new mysqli($servername, $username, $password, $dbname);

    if (isset($_GET['produto_id'])) {
        $delete_id =$_GET['produto_id'];
        $delete_product = "DELETE FROM `produtos` WHERE id=$delete_id";
        $result_product =mysqli_query($con, $delete_product);
        if($result_product){
            
            echo "<p>Product Deleted Successfully.</p>";
            echo "<script> window.open('./visualisar_produtos.php', '_self')</script>";
        }

    }

?>