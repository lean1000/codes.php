<!-- Importa o CSS do Bootstrap para estilização -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<?php
// Define a string de conexão (DSN) para o banco de dados MySQL
$dsn = 'mysql:dbname=db_chamadinha;host=127.0.0.1';

// Define o nome de usuário para conexão com o banco de dados
$user = 'root';

// Define a senha do banco de dados (nesse caso, está vazia)
$password = '';

// Cria uma nova conexão com o banco de dados utilizando PDO
$banco = new PDO($dsn, $user, $password);

// Define a consulta SQL para selecionar todos os registros da tabela "tb_aluno"
$select = "SELECT * FROM tb_aluno";

// Executa a consulta no banco e armazena todos os resultados em um array
$resultado = $banco->query($select)->fetchAll();
?>

<!-- Define um container principal usando classes do Bootstrap -->
<main class="container my-5">

    <!-- Cria uma tabela com classes do Bootstrap para estilização -->
    <table class="table table-striped">

        <!-- Div para botão de adicionar novo aluno, alinhado à direita -->
        <div class="my-3 d-flex justify-content-end">
            <a href="formulario.php" class="btn btn-success">Cadastrar Novo Aluno</a>
        </div>

        <!-- Cabeçalho da tabela -->
        <tr>
            <td>id</td>
            <td>nome</td>
            <td class="text-center">ação</td>
        </tr>

        <!-- Início do loop para percorrer os registros do banco -->
        <?php foreach($resultado as $linha) { ?> 
            <tr>
                <!-- Exibe o ID do aluno -->
                <td>  <?=$linha['id'] ?> </td>

                <!-- Exibe o nome do aluno -->
                <td>  <?php echo $linha['nome'] ?> </td>

                <!-- Coluna com botões de ação (Abrir, Editar, Excluir) -->
                <td class="text-center">
                    <!-- Link para visualizar a ficha do aluno -->
                    <a class="btn btn-primary" href="ficha.php?id_aluno=<?=$linha['id'] ?>">Abrir</a>

                    <!-- Link para editar os dados do aluno -->
                    <a class="btn btn-warning" href="formulario-editar.php?id_aluno_alterar=<?=$linha['id'] ?>">Editar</a>

                    <!-- Link para excluir o aluno -->
                    <a class="btn btn-danger" href="aluno-deletar.php?id=<?=$linha['id'] ?>">Excluir</a>
                </td>
            </tr>
        <?php } ?> <!-- Fim do loop -->
    </table>
</main>
