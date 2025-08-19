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
    </style>
</head>
<body>
    <h2>Lista de Livros Cadastrados</h2>

    <a href="index.php">Voltar</a> <br>
    <?php

        require_once "conexao.php";

        // SELECT * FROM tb_livro;
        $sql = "SELECT id_livro, tb_livro.nome AS nome_livro, genero, ano, foto, tb_autor.nome AS nome_autor FROM tb_livro INNER JOIN tb_autor ON tb_livro.id_autor = tb_autor.id_autor;";
        $comando = mysqli_prepare($conexao, $sql);

        mysqli_stmt_execute($comando);

        $resultados = mysqli_stmt_get_result($comando);

        // echo $resultados;
        // print_r($resultados);

        echo "<table border='1'>";
        echo "<tr>";
        echo "<td>ID</td>";
        echo "<td>Foto</td>";
        echo "<td>Nome</td>";
        echo "<td>Autor</td>";
        echo "<td>Gênero</td>";
        echo "<td>Ano</td>";
        echo "<td>AÇÃO</td>";
        echo "</tr>";
        while ($livro = mysqli_fetch_assoc($resultados)) {
            $id_livro = $livro['id_livro'];
            $nome = $livro['nome_livro'];
            $genero = $livro['genero'];
            $ano = $livro['ano'];
            $foto = $livro['foto'];
            $autor = $livro['nome_autor'];

                       
            // echo "$id_livro - $nome<br>";

            echo "<tr>";
            echo "<td>$id_livro</td>";
            echo "<td><img src='fotos/$foto'></td>";
            echo "<td>$nome</td>";
            echo "<td>$autor</td>";
            echo "<td>$genero</td>";
            echo "<td>$ano</td>";
            echo "<td><a href='deletar_livro.php?id=$id_livro'><img src='delete-button.png'></a></td>";
            echo "</tr>";


        }
        echo "</table>";



        mysqli_stmt_close($comando);    
    ?>
</body>
</html>