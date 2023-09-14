<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Produtos</title>
</head>
<body>
    <h1>Cadastro de Produtos</h1>
    <form action="cadastrar_produto.php" method="post" enctype="multipart/form-data">
        Nome: <input type="text" name="nome"><br>
        Valor: <input type="text" name="valor"><br>
        Descrição: <textarea name="descricao"></textarea><br>
        Imagem: <input type="file" name="imagem"><br>
        <label for="categoria">Categoria:</label>
<select name="categoria">
    <option value="1">Categoria 1</option>
    <option value="2">Categoria 2</option>
    <!-- Adicione mais opções de categoria conforme necessário -->
</select>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
