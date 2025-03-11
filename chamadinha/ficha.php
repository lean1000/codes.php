<?php
// Início do código PHP

$id_aluno = $_GET['id_aluno'];
// Obtém o parâmetro 'id_aluno' da URL, que será usado para identificar o aluno a ser exibido

$dsn = 'mysql:dbname=db_chamadinha;host=127.0.0.1';
$user = 'root';
$password = '';
// Configurações de conexão com o banco de dados MySQL (usando PDO)

$banco = new PDO($dsn, $user, $password);
// Cria uma instância de PDO para estabelecer a conexão com o banco de dados

$select = "SELECT tb_info_alunos.*, tb_aluno.nome FROM tb_info_alunos INNER JOIN tb_aluno ON tb_aluno.id = tb_info_alunos.id_alunos WHERE tb_info_alunos.id_alunos= " . $id_aluno;
// Consulta SQL que busca as informações do aluno com o id fornecido, usando um INNER JOIN entre as tabelas 'tb_info_alunos' e 'tb_aluno'

$dados = $banco->query($select)->fetch();
// Executa a consulta SQL e armazena o resultado na variável $dados, que conterá as informações do aluno (uma linha)
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<!-- Importa o CSS do Bootstrap 5 para estilização do formulário e dos componentes da página -->

<style>
    main {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    /* Define que o elemento <main> terá um layout flexível disposto na vertical (coluna) e com alinhamento central */

    form {
        width: 600px;
    }
    /* Define que o formulário terá uma largura fixa de 600px */

    img {
        width: 200px;
        object-fit: cover;
    }
    /* Define que as imagens terão largura de 200px e a propriedade 'object-fit: cover' para ajustar a imagem sem distorção */
</style>

<main class="container text-center my-5">
<!-- Inicia o contêiner principal, com alinhamento central e margens superior e inferior (my-5) -->

    <img src="./img/<?= $dados['img'] ?>" alt="imagem do perfil" class="img-thumbnail">
    <!-- Exibe a imagem do aluno, usando o caminho da imagem armazenado no banco de dados. A classe 'img-thumbnail' aplica uma borda e estilo de miniatura à imagem -->

    <form action="#">
    <!-- O formulário é exibido, mas o atributo 'action' está vazio, o que significa que ele não envia para nenhum lugar -->

        <label for="nome">Nome:</label>
        <!-- Label para o campo "Nome" -->

        <input type="text" value="<?= $dados['nome'] ?>" disabled class="form-control">
        <!-- Campo de texto para o nome do aluno, preenchido com o valor vindo do banco de dados. O atributo 'disabled' impede que o campo seja editado -->

        <div class="row mt-2">
        <!-- Cria uma linha para organizar os campos de telefone e e-mail -->

            <div class="col">
                <label for="telefone">Telefone:</label>
                <!-- Label para o campo "Telefone" -->

                <input type="number" value="<?= $dados['telefone'] ?>" disabled class="form-control">
                <!-- Campo de número para o telefone, preenchido com o valor do banco de dados, e 'disabled' para impedir a edição -->
            </div>

            <div class="col">
                <label for="email">Email:</label>
                <!-- Label para o campo "Email" -->

                <input type="email" value="<?= $dados['email'] ?>" disabled class="form-control">
                <!-- Campo de e-mail, preenchido com o valor do banco de dados, e 'disabled' para impedir a edição -->
            </div>
        </div>

        <div class="row mt-2">
        <!-- Nova linha para os campos de data de nascimento e a opção "Frequente" -->

            <div class="col">
                <label for="data_nascimento">Data de Nascimento:</label>
                <!-- Label para o campo "Data de Nascimento" -->

                <input type="date" value="<?= $dados["nascimento"] ?>" disabled class="form-control">
                <!-- Campo de data para a data de nascimento do aluno, preenchido com o valor vindo do banco de dados e 'disabled' para impedir edição -->
            </div>

            <div class="col my-4 pt-2">
                <input type="checkbox" class="form-check-input">
                <!-- Caixa de seleção (checkbox) para a opção "Frequente", sem valor fixo neste código (não é possível editá-la devido à falta de 'disabled') -->
                <label for="frequente">Frequente:</label>
                <!-- Label para o campo "Frequente" -->
            </div>
        </div>
    </form>
</main>
