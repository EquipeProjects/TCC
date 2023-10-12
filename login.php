<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<main>

    
    <form class="login" action="verifica_login.php" method="POST"  
    style="align-items:center;">
    <div class="logo">
            <a href="index.php">
                <img src="img/logo.png" alt="Your Logo">
            </a>
        </div>
    <label for="username">SUA CONTA PARA TUDO DA Easy FIT</label><br>
    <label for="username">Nome de Usuário:</label>
    <input type="text" id="username" name="username" required>
    <br>
    <label for="password">Senha:</label>
    <input type="password" id="password" name="password" required>
    <label>esqueceu sua senha?</label> 
    <br>
    <label for="username">Ao fazer login, você concorda com a Política de privacidade e com os Termos de uso do easyfit.com.br.<label for="username">
    <a href="cadastro.php">Fazer cadastro</a>
    <input class="button_login" type="submit" value="Entrar">
    
  
</form>
</main>
    
</body>
</html>

