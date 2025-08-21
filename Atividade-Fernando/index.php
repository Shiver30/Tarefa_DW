<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Página inicial</h1>

    <a href="form_livro.php">Cadastrar Livro</a> <br>
    <a href="form_autor.php">Cadastrar Autor</a> <br>
    <a href="form_curso.php">Cadastrar Curso</a> <br>
    <a href="form_aluno.php">Cadastrar Aluno</a> <br>
    <a href="form_emprestimo.php">Cadastrar Emprestimo</a> <br>
    <hr>

    <a href="listar_livros.php">Lista de Livros</a> <br>
    <a href="listar_livros_2.php">Lista de Livros (cartões)</a> <br>
    <a href="listar_autor.php">Listar Autores</a> <br>
    <a href="listar_aluno.php">Listar Alunos</a>


    <p>
    <?php
    
    require_once "conexao.php";

        $sql = "Select count(nome) as 'Alunos Cadastrados' FROM tb_aluno;";
        $comando = mysqli_prepare($conexao, $sql);
        mysqli_stmt_execute($comando);

        $resultados = mysqli_stmt_get_result($comando);

        while ($comando = mysqli_fetch_assoc($resultados)) {
            $totalAluno = $comando['Alunos Cadastrados'];
        }
        echo"Quantidade de Alunos: <br> $totalAluno";
        // echo $resultados;
        // print_r($resultados) esse toma bomba;
    ?>
    </p>

    <p>
    <?php
    
    require_once "conexao.php";

        $sql = "Select count(nome) as 'Quantidade de Autor' FROM tb_autor";
        $comando = mysqli_prepare($conexao, $sql);
        mysqli_stmt_execute($comando);

        $resultados = mysqli_stmt_get_result($comando);

        while ($comando = mysqli_fetch_assoc($resultados)) {
            $totalAutor = $comando['Quantidade de Autor'];
        }
        echo"Quantidade de Autores: <br> $totalAutor";
    
    ?>
    </p>

      <p>
    <?php
    
    require_once "conexao.php";

        $sql = "Select count(nome) as 'Quantidade livro' FROM tb_livro;";
        $comando = mysqli_prepare($conexao, $sql);
        mysqli_stmt_execute($comando);

        $resultados = mysqli_stmt_get_result($comando);

        while ($comando = mysqli_fetch_assoc($resultados)) {
            $totalLivro = $comando['Quantidade livro'];
        }
        echo"Quantidade de Livros: <br> $totalLivro";
    
    ?>
    </p>

    <?php

    require_once "conexao.php";

        $sql = "select ano as 'Ano do Livro', nome as 'Livro Antigo' from tb_livro order by ano ASC limit 1;";
        $comando = mysqli_prepare($conexao, $sql);
        mysqli_stmt_execute($comando);

        $resultados = mysqli_stmt_get_result($comando);

        while ($comando = mysqli_fetch_assoc($resultados)) {
            $livroAntigo = $comando['Livro Antigo'];
            $anoLivro = $comando['Ano do Livro'];
        }
        echo"Livro mais Antigo: <br> $livroAntigo $anoLivro";
    
    ?>
     <br><br>

    <?php

    require_once "conexao.php";

        $sql = "select data_nascimento as 'Nascimento', nome as 'Autor mais Jovem' from tb_autor order by data_nascimento DESC limit 1;";
        $comando = mysqli_prepare($conexao, $sql);
        mysqli_stmt_execute($comando);

        $resultados = mysqli_stmt_get_result($comando);

        while ($comando = mysqli_fetch_assoc($resultados)) {
            $autorJovem = $comando['Autor mais Jovem'];
            $autorAno = $comando['Nascimento'];
        }
        echo"Autor mais Jovem: <br> $autorJovem $autorAno";
    
    ?>

    <?php

    require_once "conexao.php";

        $sql = " ";
        $comando = mysqli_prepare($conexao, $sql);
        mysqli_stmt_execute($comando);

        $resultados = mysqli_stmt_get_result($comando);

        while ($comando = mysqli_fetch_assoc($resultados)) {
            $autorJovem = $comando['Autor mais Jovem'];
            $autorAno = $comando['Nascimento'];
        }
        echo"Autor mais Jovem: <br> $autorJovem $autorAno";
    
    ?>






</body>
</html>