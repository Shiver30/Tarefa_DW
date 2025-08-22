<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body, h1, p {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f4f9;
            color: #333;
            line-height: 1.6;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }

        .dashboard-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 250px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }

        .card h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #3498db;
        }

        .card p {
            font-size: 18px;
            color: #34495e;
        }

        .links-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .links-container a {
            color: #3498db;
            text-decoration: none;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        .links-container a:hover {
            color: #2c3e50;
        }
    </style>
</head>
<body>

    <h1>Dashboard de Cadastro</h1>

    <div class="links-container">
        <a href="form_livro.php">Cadastrar Livro</a>
        <a href="form_autor.php">Cadastrar Autor</a>
        <a href="form_curso.php">Cadastrar Curso</a>
        <a href="form_aluno.php">Cadastrar Aluno</a>
        <a href="form_emprestimo.php">Cadastrar Emprestimo</a>
    </div>

    <div class="links-container">
        <a href="listar_livros.php">Lista de Livros</a>
        <a href="listar_livros_2.php">Lista de Livros (cartões)</a>
        <a href="listar_autor.php">Listar Autores</a>
        <a href="listar_aluno.php">Listar Alunos</a>
    </div>

    <div class="dashboard-container">

        <div class="card">
            <h2>Quantidade de Alunos</h2>
            <p>
                <?php
                    require_once "conexao.php";
                    $sql = "SELECT count(nome) as 'Alunos Cadastrados' FROM tb_aluno;";
                    $comando = mysqli_prepare($conexao, $sql);
                    mysqli_stmt_execute($comando);
                    $resultados = mysqli_stmt_get_result($comando);
                    while ($comando = mysqli_fetch_assoc($resultados)) {
                        $totalAluno = $comando['Alunos Cadastrados'];
                    }
                    echo "$totalAluno";
                ?>
            </p>
        </div>

        <div class="card">
            <h2>Quantidade de Autores</h2>
            <p>
                <?php
                    require_once "conexao.php";
                    $sql = "SELECT count(nome) as 'Quantidade de Autor' FROM tb_autor";
                    $comando = mysqli_prepare($conexao, $sql);
                    mysqli_stmt_execute($comando);
                    $resultados = mysqli_stmt_get_result($comando);
                    while ($comando = mysqli_fetch_assoc($resultados)) {
                        $totalAutor = $comando['Quantidade de Autor'];
                    }
                    echo "$totalAutor";
                ?>
            </p>
        </div>

        <div class="card">
            <h2>Quantidade de Livros</h2>
            <p>
                <?php
                    require_once "conexao.php";
                    $sql = "SELECT count(nome) as 'Quantidade livro' FROM tb_livro;";
                    $comando = mysqli_prepare($conexao, $sql);
                    mysqli_stmt_execute($comando);
                    $resultados = mysqli_stmt_get_result($comando);
                    while ($comando = mysqli_fetch_assoc($resultados)) {
                        $totalLivro = $comando['Quantidade livro'];
                    }
                    echo "$totalLivro";
                ?>
            </p>
        </div>

        <div class="card">
            <h2>Livro Mais Antigo</h2>
            <p>
                <?php
                    require_once "conexao.php";
                    $sql = "SELECT ano AS 'Ano do Livro', nome AS 'Livro Antigo' FROM tb_livro ORDER BY ano ASC LIMIT 1;";
                    $comando = mysqli_prepare($conexao, $sql);
                    mysqli_stmt_execute($comando);
                    $resultados = mysqli_stmt_get_result($comando);
                    while ($comando = mysqli_fetch_assoc($resultados)) {
                        $livroAntigo = $comando['Livro Antigo'];
                        $anoLivro = $comando['Ano do Livro'];
                    }
                    echo "$livroAntigo ($anoLivro)";
                ?>
            </p>
        </div>

        <div class="card">
            <h2>Autor Mais Jovem</h2>
            <p>
                <?php
                    require_once "conexao.php";
                    $sql = "SELECT data_nascimento AS 'Nascimento', nome AS 'Autor mais Jovem' FROM tb_autor ORDER BY data_nascimento DESC LIMIT 1;";
                    $comando = mysqli_prepare($conexao, $sql);
                    mysqli_stmt_execute($comando);
                    $resultados = mysqli_stmt_get_result($comando);
                    while ($comando = mysqli_fetch_assoc($resultados)) {
                        $autorJovem = $comando['Autor mais Jovem'];
                        $autorAno = $comando['Nascimento'];
                    }
                    echo "$autorJovem ($autorAno)";
                ?>
            </p>
        </div>

        <div class="card">
            <h2>Autor com Mais Livros</h2>
            <p>
                <?php
                    require_once "conexao.php";
                    $sql = "SELECT a.nome, COUNT(l.id_livro) AS quantidade_de_livros FROM tb_autor AS a JOIN tb_livro AS l ON a.id_autor = l.id_autor GROUP BY a.id_autor, a.nome ORDER BY quantidade_de_livros DESC LIMIT 1;";
                    $comando = mysqli_prepare($conexao, $sql);
                    mysqli_stmt_execute($comando);
                    $resultados = mysqli_stmt_get_result($comando);
                    while ($comando = mysqli_fetch_assoc($resultados)) {
                        $autorMais = $comando['nome'];
                    }
                    echo "$autorMais";
                ?>
            </p>
        </div>

        <div class="card">
            <h2>Emprestimo Mais Antigo</h2>
            <p>
                <?php
                    require_once "conexao.php";
                    $sql = "SELECT data_emprestimo AS 'Emprestimo antigo' FROM tb_emprestimo ORDER BY data_emprestimo ASC LIMIT 1;";
                    $comando = mysqli_prepare($conexao, $sql);
                    mysqli_stmt_execute($comando);
                    $resultados = mysqli_stmt_get_result($comando);
                    while ($comando = mysqli_fetch_assoc($resultados)) {
                        $emprestimoAntigo = $comando['Emprestimo antigo'];
                    }
                    echo "$emprestimoAntigo";
                ?>
            </p>
        </div>

    </div>

</body>
</html>
