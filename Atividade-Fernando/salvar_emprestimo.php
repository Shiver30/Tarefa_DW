<?php
    require_once "conexao.php";
    
    // pega as valores lá do formulário
    $id_aluno = $_POST['id_aluno'];
    $id_livro = $_POST['id_livro'];
    $emprestimo = $_POST['emprestimo'];
    $devolucao =$_POST['devolucao'];

    $sql = "INSERT INTO tb_emprestimo (id_aluno, id_livro, data_emprestimo, data_devolucao) VALUES (?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);

    // letra s -> varchar, date, datetime, char
    // letra i -> int
    // letra d -> float, decimal
    mysqli_stmt_bind_param($comando, 'iiss', $id_aluno, $id_livro, $emprestimo, $devolucao);

    mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);

    header("Location: index.php");
?>
