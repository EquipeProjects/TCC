<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Easyfit</title>
  <link rel="stylesheet" href="css/login.css">
  <link rel="shortcut icon" href="/ico/logo.ico" type="image/x-icon">
  <meta name="author" content="João Victor,Davi Ribeiro e Yzabella Luiza">
  <meta name="keywords" content="HTML,CSS,JavaScript">
  <meta name="description"
    content="Um web site de vendas de roupas sob medida que adequa qualquer corpo,gosto e estilo.">
</head>

<body>
  <script defer src="js/index.js"></script>
  <header>

    <a href="index.html"><img class="logo" src="img/logo.png"></a>


  </header>


  
  <form action="#" id="imageSelectionForm">
    <main>
        <div class="cliente">
            <span>cliente</span>
            <img tabindex="0" src="img/login-user.png" alt="" id="clienteImage" onclick="selectImage('cliente')">
        </div>
        <div class="vendedor">
            <span>vendedor</span>
            <img tabindex="0" src="img/vendedor.png" alt="" id="vendedorImage" onclick="selectImage('vendedor')">
        </div>
    </main>
    <div style="display: flex;justify-content: center; align-items: center;">
        <button class="btn-generic" type="button" onclick="submitForm()"> selecionar </button>
    </div>
</form>



<form  method="post" action="login.php" action="" id="cliente" class="tes1">
  <span> criar conta </span>
  <input type="text" name="username" placeholder="Nome*">
  <input type="text" placeholder="Sobrenome*">
  <input type="text" name="email_or_phone" placeholder="Email ou telefone*">
  <input type="text" name="password" placeholder="Senha*">
  <input type="text" placeholder="Repita a senha*">
  <button class="btn-generic" type="submit" value="Cadastrar">finalizar</button>
  <img src="" alt="">

</form>
<form action="" id="vendedor" class="tes2">
  <span> cadastrar empresa </span>
  <input type="text" placeholder="Nome*">
  <input type="text" placeholder="sobrenome*">
  <input type="text" placeholder="CNPJ*">
  <input type="text" placeholder="razão social*">
  <input type="text" placeholder="inscrção estadual*">
  <input type="text" placeholder="Endereço*">
  <input type="text" placeholder="Bairro*">
  <div style="display: flex;flex-direction: row;flex-wrap: nowrap;">
  <input type="text" placeholder="Estado*">
  <input type="text" placeholder="Numero*">
</div>
  <input type="text" placeholder="Email*">
  <input type="text" placeholder="telefone*">
  <button class="btn-generic">FINALIZAR</button>




</form>


</body>

</html>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleção de Imagem</title>
</head>
<body>
    

    <script>
        let selectedImage = '';
        function selectImage(imageType) {
            selectedImage = imageType;
        }

   

        function submitForm() {

          let cliente = document.getElementById("cliente");
          let vendedor = document.getElementById("vendedor");
          let imageSelectionForm = document.getElementById("imageSelectionForm")
            if (selectedImage === 'cliente') {
                cliente.style.opacity="1";
                imageSelectionForm.style.display="none";
              } else {
                vendedor.style.opacity="1";
                imageSelectionForm.style.display="none";
         
            }
        }
    </script>
</body>
</html>
