

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
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
                    <td><a href='index.php?edit_products=<?php echo $product_id; ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i>Update</a></td>
                    <td><a href='index.php?delete_product=<?php echo $product_id; ?>' class='text-light'><i class='fa-solid fa-trash'></i>Delete</a></td>
                </tr>
                <?php
                }
            
            ?>
           
        </tbody>
    </table>
</body>
</html>