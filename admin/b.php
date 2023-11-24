<!DOCTYPE html>
<html lang="pt-BR">



<head>
    <!-- Seu código anterior ... -->
    <style>
        .rating {
            display: inline-block;
            font-size: 24px;
            cursor: pointer;
        }

        .rating span {
            color: gray;
            padding: 5px;
        }

        .rating span.active {
            color: gold;
        }
    </style>
    <!-- Seu código anterior ... -->
</head>

<body>
    <!-- Seu código anterior ... -->

    <div class="container">
        <!-- Seu código anterior ... -->

        <!-- Exibir Estrelas e Média das Avaliações -->
        <div class="stars" id="stars-container">
            <?php

            $servername = "localhost";
$username = "root";
$password = "";
$dbname = "meubanco";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}
            // Código para calcular a média das avaliações no PHP e exibir as estrelas
            $produto_id = 65;
            $sql_avaliacoes = "SELECT AVG(avaliacao) as media FROM avaliacoes WHERE produto_id = $produto_id";
            $result_avaliacoes = $conn->query($sql_avaliacoes);

            if ($result_avaliacoes->num_rows > 0) {
                $row_avaliacoes = $result_avaliacoes->fetch_assoc();
                $media_avaliacoes = $row_avaliacoes['media'];

                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $media_avaliacoes) {
                        echo '<span class="active">&#9733;</span>';
                    } else {
                        echo '<span>&#9733;</span>';
                    }
                }
            }
            ?>
        </div>

        <!-- Formulário de Avaliação -->
        <form id="form-avaliacao">
            <label for="avaliacao">Avaliação:</label>
            <div class="rating" onclick="selecionarEstrela(event)">
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
            </div>

            <label for="comentario">Comentário:</label>
            <textarea name="comentario" id="comentario"></textarea>

            <button type="button" onclick="enviarAvaliacao()">Enviar Avaliação</button>
        </form>

        <!-- Seu código anterior ... -->
    </div>

    <!-- Seu código anterior ... -->

    <script>
        function enviarAvaliacao() {
            var avaliacao = document.querySelectorAll('.rating span.active').length;
           
            var comentario = document.getElementById('comentario').value;
            var id = <?php echo $produto_id; $conn->close()?>;
            var xhr = new XMLHttpRequest();
    xhr.open('POST', 'processa_avaliacao.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Atualizar a página ou realizar outras ações após o envio da avaliação
            location.reload();
        }
    };
    xhr.send('avaliacao=' + avaliacao + '&comentario=' + comentario+'&produto_id='+id);
        }

        function selecionarEstrela(event) {
            const estrelas = document.querySelectorAll('.rating span');
            const estrelaClicada = event.target;

            estrelas.forEach((estrela, index) => {
                if (estrela === estrelaClicada || estrela.contains(estrelaClicada)) {
                    for (let i = 0; i <= index; i++) {
                        estrelas[i].classList.add('active');
                    }
                    for (let i = index + 1; i < estrelas.length; i++) {
                        estrelas[i].classList.remove('active');
                    }
                }
            });
        }
    </script>
</body>

</html>
