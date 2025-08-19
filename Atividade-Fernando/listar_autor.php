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
    <h2>Lista de Autor Cadastrados</h2>

    <a href="index.php">Voltar</a> <br>
    <?php

        require_once "conexao.php";

        $sql = "SELECT * FROM tb_autor";
                
        $comando = mysqli_prepare($conexao, $sql);

        mysqli_stmt_execute($comando);

        $resultados = mysqli_stmt_get_result($comando);

        // echo $resultados;
        // print_r($resultados);

        echo "<table>";
        echo "<tr>";
        echo "<td>ID</td>";
        echo "<td>Nome</td>";
        echo "<td>data_nascimento</td>";
        echo "<td>nacionalidade</td>";
        echo "</tr>";
        while ($autor = mysqli_fetch_assoc($resultados)) {
            $id_autor = $autor['id_autor'];
            $nome = $autor['nome'];
            $data_nascimento = $autor['data_nascimento'];
            $nacionalidade = $autor['nacionalidade'];

                       
            // echo "$id_livro - $nome<br>";

            echo "<tr>";
            echo "<td>$id_autor</td>";
            echo "<td>$nome</td>";
            echo "<td>$data_nascimento</td>";
            echo "<td>$nacionalidade</td>";
            echo "<td><a href='deletar_livro.php?id=$id_autor'><img src='delete-button.png'></a></td>";
            echo "</tr>";


        }
        echo "</table>";



        mysqli_stmt_close($comando);    
    ?>
</body>
</html>