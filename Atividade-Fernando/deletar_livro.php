<?php
    require_once "conexao.php";

    $id = $_GET['id'];

    $sql = "DELETE FROM tb_livro WHERE id_livro = $id";

    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);

    header("Location: listar_livros.php");
?>