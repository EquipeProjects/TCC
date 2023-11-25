

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

            
          
<a href="javascript:void(0);" onclick="goBack()"><img class="logo" src="img/logo.png" alt="Your Logo"></a></div>

<script>
    function goBack() {
        window.history.back();
    }
</script>
    <h2 class="text-center text-success">
        All Products
    </h2>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <tr class='text-center'>
                <th>Product ID</th>
                <th>Product Title</th>
                <th>Product Image </th>
                <th>Product Price</th>
                <th>Total Sold</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody class="bg-secondary text-light">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "meubanco";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Erro na conexão com o banco de dados: " . $conn->connect_error);
            }


            if(isset($_GET['delete_product'])) {
                $produto_id = $_GET['delete_product'];
                // Verifique se o ID do produto é válido (por exemplo, se é um número inteiro positivo)
                if(is_numeric($produto_id) && $produto_id > 0) {
                    // Execute a consulta SQL para excluir o produto
                    $sql = "DELETE FROM produtos WHERE id = $produto_id";
                    if ($conn->query($sql) === TRUE) {
                        echo "Produto excluído com sucesso.";
                    } else {
                        echo "Erro ao excluir o produto: " . $conn->error;
                    }
                } else {
                    echo "ID de produto inválido.";
                }
            }
            
                $get_products="SELECT * FROM `produtos`";
                $result=mysqli_query($conn, $get_products);
                $number=0;
                while($row=mysqli_fetch_assoc($result)){
                    $product_id = $row['id'];
                    $product_title = $row['nome']; 
                    $product_image1 = $row['imagem'];
                    $product_price = $row['valor'];
                    $number++;
                    ?>
                    
                    <tr class='text-center'>
                    <td><?php echo $number;?></td>
                    <td><?php echo $product_title;?></td>
                    <td><img src='<?php echo$product_image1;?>' style="max-height: 300px;" class='product-img'/></td>
                    <td><?php echo $product_price?> /=</td>
                    <td><?php
                    
                
                    
                    ?></td>
                   <td><a href='editar_produto.php?produto_id=<?php echo $product_id; ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i>Update</a></td>

                    <td><a href='visualizar_produtos.php?delete_product=<?php echo $product_id; ?>' class='text-light'><i class='fa-solid fa-trash'></i>Delete</a></td>
                </tr>
                <?php
                }
            
            ?>
           
        </tbody>
    </table>
</body>
</html>