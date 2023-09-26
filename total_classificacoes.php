<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Classificação por Estrelas</title>
    <style>
        .rating {
            text-align: center;
        }
        .rating > span {
            display: inline-block;
            width: 1.1em;
            cursor: pointer;
        }
        .rating > span:before {
            content: "\2605"; /* Estrela preenchida */
        }
        .rating > span.empty:before {
            content: "\2606"; /* Estrela vazia */
        }
        #notification {
            background-color: #f0f0f0;
            padding: 10px;
            border: 1px solid #ccc;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Classificação por Estrelas</h1>
    <div class="rating">
        <span class="empty" onclick="rate(1)"></span>
        <span class="empty" onclick="rate(2)"></span>
        <span class="empty" onclick="rate(3)"></span>
        <span class="empty" onclick="rate(4)"></span>
        <span class="empty" onclick="rate(5)"></span>
    </div>

    <h2>Deixe um Comentário</h2>
    <form method="post" action="processa_avaliacao.php">
        <input type="hidden" id="ratingValue" name="ratingValue" value="0">
        <textarea id="commentText" name="commentText" rows="4" cols="50"></textarea>
        <br>
        <button type="submit">Enviar Comentário</button>
    </form>

    <h2>Comentários</h2>
    <div id="comments">
        <?php include 'exibir_comentarios.php'; ?>
    </div>

    <div id="notification">
        <h3>Classificações</h3>
        <div id="ratingStats">
            Média: <span id="averageRating">0</span><br>
            Porcentagem de Classificações:<br>
            1 Estrela: <span id="percentage1">0%</span><br>
            2 Estrelas: <span id="percentage2">0%</span><br>
            3 Estrelas: <span id="percentage3">0%</span><br>
            4 Estrelas: <span id="percentage4">0%</span><br>
            5 Estrelas: <span id="percentage5">0%</span><br>
        </div>
        <a href="todos_comentarios.php">Ver Todos os Comentários</a>
    </div>

    <script>
        const ratingValueInput = document.getElementById('ratingValue');
        const stars = document.querySelectorAll('.rating > span');

        function rate(value) {
            ratingValueInput.value = value;
            stars.forEach((star, index) => {
                if (index < value) {
                    star.classList.remove('empty');
                } else {
                    star.classList.add('empty');
                }
            });
        }

        // Função para calcular a média e a porcentagem das classificações
        function calculateStats() {
            const ratings = [0, 0, 0, 0, 0];
            const totalRatings = <?php include 'total_classificacoes.php'; ?>; // Implemente esta função para obter o total de classificações

            // Preencha o array de classificações com os dados do banco de dados
            <?php include 'carregar_classificacoes.php'; ?> // Implemente esta função para carregar as classificações

            // Calcule a média das classificações
            const totalSum = ratings.reduce((acc, rating, index) => acc + (rating * (index + 1)), 0);
            const average = totalRatings > 0 ? (totalSum / totalRatings).toFixed(2) : 0;

            // Calcule a porcentagem de cada classificação
            const percentages = ratings.map((rating) => (totalRatings > 0 ? ((rating / totalRatings) * 100).toFixed(2) : 0) + "%");

            // Atualize os elementos HTML com os valores calculados
            document.getElementById('averageRating').textContent = average;
            document.getElementById('percentage1').textContent = percentages[0];
            document.getElementById('percentage2').textContent = percentages[1];
            document.getElementById('percentage3').textContent = percentages[2];
            document.getElementById('percentage4').textContent = percentages[3];
            document.getElementById('percentage5').textContent = percentages[4];
        }

        // Chame a função para calcular as estatísticas quando a página carregar
        calculateStats();
    </script>
</body>
</html>
