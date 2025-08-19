<?php
    require_once "conexao.php";
    
    // pega as valores lá do formulário
    $nome = $_GET['nome'];
    $nascimento = $_GET['nascimento'];
    $nacionalidade = $_GET['nacionalidade'];

    $sql = "INSERT INTO tb_autor (nome, data_nascimento, nacionalidade) VALUES (?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);

    // letra s -> varchar, date, datetime, char
    // letra i -> int
    // letra d -> float, decimal
    mysqli_stmt_bind_param($comando, 'sss', $nome, $nascimento, $nacionalidade);

    mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);

    header("Location: index.php");
?>
