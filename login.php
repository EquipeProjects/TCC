<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>

    <main>
        <form class="login" action="verifica_login.php" method="POST" style="align-items:center;">
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
            <label>Esqueceu sua senha?</label>
            <br>
            <label for="username">Ao fazer login, você concorda com a Política de privacidade e com os Termos de uso do easyfit.com.br.<label for="username">
                    <a class="link_no_cont" href="cadastro.php">Fazer Login?</a>
                    <a href="#">Login with google</a>
                    <input class="button_login" type="submit" value="Entrar">
        </form>

        <!-- Bloco de script para exibir alerta -->
        <script>
            // Verifica se há uma mensagem de erro na sessão
            <?php if (isset($_SESSION['error_message'])): ?>
                var errorMessage = <?php echo json_encode($_SESSION['error_message']); ?>;
                alert(errorMessage);
                <?php unset($_SESSION['error_message']); ?>
            <?php endif; ?>
        </script>
    </main>

</body>

</html>
