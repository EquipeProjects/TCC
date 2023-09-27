<!DOCTYPE html>
<html lang="pt-br">
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
        .rating > span.filled:before {
            content: "\2605"; /* Estrela preenchida */
        }
        .comentario {
            margin: 10px;
            border: 1px solid #ccc;
            padding: 10px;
        }
        .classificacao {
            font-size: 24px;
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
        <button type="submit" id="submitBtn" disabled>Enviar Comentário</button>
    </form>

    <h2>Comentários</h2>
    <div id="comments">
        <?php 
        // Conexão com o banco de dados (substitua pelos seus dados)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sistema_login";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexão com o banco de dados falhou: " . $conn->connect_error);
        }

        // Consulta SQL para buscar os últimos 5 comentários e classificações que também possuem um comentário
        $comentarios_sql = "SELECT * FROM avaliacoes WHERE classificacao != '0' AND comentario IS NOT NULL ORDER BY id DESC LIMIT 5";

        $result_comentarios = $conn->query($comentarios_sql);

        if ($result_comentarios->num_rows > 0) {
            while ($row_comentario = $result_comentarios->fetch_assoc()) {
                $comentario = $row_comentario["comentario"];
                $classificacao_comentario = $row_comentario["classificacao"];
                
                // Exibe as estrelas de acordo com a classificação
                $estrelas = "";
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $classificacao_comentario) {
                        // Estrela preenchida
                        $estrelas .= "<span class='filled'>&#9733;</span>";
                    } else {
                        // Estrela vazia
                        $estrelas .= "<span class='empty'>&#9733;</span>";
                    }
                }
                
                echo "<div class='comentario'>";
                echo "<div class='classificacao'>$estrelas</div>";
                echo "<div class='texto'>$comentario</div>";
                echo "</div>";
            }
        } else {
            echo "<p>Nenhum comentário ou classificação disponível.</p>";
        }
        
        // Consulta SQL para calcular a porcentagem de cada tipo de classificação
        $porcentagem_sql = "SELECT classificacao, COUNT(*) AS count, (COUNT(*) / (SELECT COUNT(*) FROM avaliacoes WHERE classificacao != '0')) * 100 AS percentagem FROM avaliacoes WHERE classificacao != '0' GROUP BY classificacao";
        
        $result_porcentagem = $conn->query($porcentagem_sql);
        
        if ($result_porcentagem->num_rows > 0) {
            echo "<h2>Porcentagem de Classificações:</h2>";
            echo "<ul>";
            while ($row_porcentagem = $result_porcentagem->fetch_assoc()) {
                $classificacao_porcentagem = $row_porcentagem["classificacao"];
                $percentagem = $row_porcentagem["percentagem"];
                echo "<li>$classificacao_porcentagem: " . number_format($percentagem, 2) . "%</li>";
            }
            echo "</ul>";
        }
        
        // Calcule o total de classificações
        $total_classificacoes_sql = "SELECT COUNT(*) AS total FROM avaliacoes WHERE classificacao != '0'";
        $total_result = $conn->query($total_classificacoes_sql);
        
        if ($total_result->num_rows > 0) {
            $total_row = $total_result->fetch_assoc();
            $total_classificacoes = $total_row["total"];
            echo "<h2>Total de Classificações: $total_classificacoes</h2>";
        }
        
        // Feche a conexão com o banco de dados
        $conn->close();
        ?>
    </div>

    <a href="todos_comentarios.php">Ver Todos os Comentários</a>

    <script>
        const ratingValueInput = document.getElementById('ratingValue');
        const stars = document.querySelectorAll('.rating > span');
        const submitBtn = document.getElementById('submitBtn');

        function rate(value) {
            ratingValueInput.value = value;
            stars.forEach((star, index) => {
                if (index < value) {
                    star.classList.remove('empty');
                    star.classList.add('filled');
                } else {
                    star.classList.remove('filled');
                    star.classList.add('empty');
                }
            });

            // Habilitar o botão de envio quando uma classificação for selecionada
            submitBtn.disabled = false;
        }
    </script>   
</body>
</html>
