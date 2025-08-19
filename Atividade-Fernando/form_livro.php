<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="salvar_livro.php" method="post" enctype="multipart/form-data">
        Nome: <br>
        <input type="text" name="nome"> <br><br>
        
        Gênero: <br>
        <input type="text" name="genero"> <br><br>
        
        Ano: <br>
        <input type="text" name="ano"> <br><br>

        Autor: <br>
        <select name="autor">
            <?php
                require_once "conexao.php";

                $sql = "SELECT * FROM tb_autor";

                $comando = mysqli_prepare($conexao, $sql);
                mysqli_stmt_execute($comando);
                $resultados = mysqli_stmt_get_result($comando);

                while ($autor = mysqli_fetch_assoc($resultados)) {
                    $nome = $autor['nome'];
                    $id = $autor['id_autor'];

                    echo "<option value='$id'>$nome</option>";
                }
            ?>
        </select> <br><br>

        Foto: <br>
        <input type="file" name="foto"> <br><br>

        <input type="submit" value="Salvar Livro">
    </form>
</body>
</html>