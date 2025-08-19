<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img {
            width: 60px;
            height: 60px;
        }

        div {
            border-style: solid
        }

        .conteiner {
            border-color: blue;
            display: flex;
            flex-wrap: wrap;
        }

        .livro {
            border-color: lightblue;
            padding: 20px;
            width: 220px;
            margin: 20px;
        }

        .livro img {
            width: 60px;
        }
    </style>
</head>
<body>
    <h2>Lista de Livros Cadastrados</h2>

    <a href="index.php">Voltar</a> <br>

    <div class="conteiner">
    <?php

        require_once "conexao.php";

        $sql = "SELECT * FROM tb_livro";
        $comando = mysqli_prepare($conexao, $sql);

        mysqli_stmt_execute($comando);

        $resultados = mysqli_stmt_get_result($comando);

        while ($livro = mysqli_fetch_assoc($resultados)) {
            $id_livro = $livro['id_livro'];
            $nome = $livro['nome'];
            $genero = $livro['genero'];
            $ano = $livro['ano'];
            $foto = $livro['foto'];
            
            echo "<div class='livro'>";
            echo "<img src='#'>";
            echo "<p>$id_livro - $nome</p>";
            echo "<p>Gênero: <span>$genero</span></p>";
            echo "<p>Ano: $ano</p>";
            echo "</div>";
        }
        mysqli_stmt_close($comando);    
    ?>
    </div>
</body>
</html>