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
        .notification {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            background-color: #f7f7f7;
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

    <div class="notification" id="ratingNotification">
        <!-- As informações de classificação serão exibidas aqui -->
    </div>

    <a href="todos_comentarios.php">Ver Todos os Comentários</a>

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

            updateRatingNotification(); // Atualizar notificação de classificação
        }

        function updateRatingNotification() {
            // Você pode calcular a média das classificações e o percentual de cada classificação aqui
            // Por exemplo, você pode fazer consultas no banco de dados para obter essas informações

            // Exemplo: média de classificações
            const averageRating = calculateAverageRating();
            const totalRatings = getTotalRatings();

            // Exemplo: percentual de cada classificação
            const ratingsPercentages = calculateRatingsPercentages();

            const notificationDiv = document.getElementById('ratingNotification');
            notificationDiv.innerHTML = `
                <p>Média de Classificações: ${averageRating.toFixed(2)}</p>
                <p>Total de Avaliações: ${totalRatings}</p>
                <p>Percentual de Classificações:</p>
                <ul>
                    <li>1 Estrela: ${ratingsPercentages[1]}%</li>
                    <li>2 Estrelas: ${ratingsPercentages[2]}%</li>
                    <li>3 Estrelas: ${ratingsPercentages[3]}%</li>
                    <li>4 Estrelas: ${ratingsPercentages[4]}%</li>
                    <li>5 Estrelas: ${ratingsPercentages[5]}%</li>
                </ul>
            `;
        }
    </script>
</body>
</html>