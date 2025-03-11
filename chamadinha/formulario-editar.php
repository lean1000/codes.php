<!DOCTYPE html>
<html lang="pt-br">
<!-- Inicia o documento HTML e define o idioma da página como português do Brasil -->

<head>
    <meta charset="UTF-8">
    <!-- Define o conjunto de caracteres como UTF-8, permitindo o uso de caracteres especiais como acentos -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Configura a viewport para dispositivos móveis, garantindo que o layout seja responsivo -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Importa o CSS do Bootstrap 5 para estilização dos componentes, como botões, formulários, etc. -->

    <title>Formulário</title>
    <!-- Define o título da página, que aparecerá na aba do navegador -->
</head>

<body>

    <style>
        main {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        /* Define que o elemento <main> terá um layout flexível, disposto na vertical (coluna), com alinhamento central */

        form {
            width: 600px;
        }
        /* Define que o formulário terá uma largura fixa de 600px */

        img {
            width: 200px;
            object-fit: cover;
        }
        /* Define que as imagens terão largura de 200px e ajustam a imagem para cobrir totalmente o contêiner sem distorção */
    </style>

    <main class="container text-center my-5">
    <!-- Define o container principal com o estilo centralizado e margens em cima e embaixo (my-5) -->

        <h2>EDITAR CADASTRO</h2>
        <br>
        <!-- Título da página, informando que é para editar o cadastro -->

        <?php 
        // Início do código PHP

            $id_aluno_alterar = $_GET['id_aluno_alterar'];
            // Obtém o parâmetro 'id_aluno_alterar' da URL para identificar o aluno que será alterado

            var_dump($id_aluno_alterar);
            // Exibe o valor de 'id_aluno_alterar' para depuração (apenas para fins de teste)

            $dsn = 'mysql:dbname=db_chamadinha;host=127.0.0.1';
            $user = 'root';
            $password = '';
            // Configurações de conexão com o banco de dados MySQL

            $banco = new PDO($dsn, $user, $password);
            // Cria uma instância PDO para conectar ao banco de dados

            $select = "SELECT tb_info_alunos.*, tb_aluno.nome FROM tb_info_alunos INNER JOIN tb_aluno ON tb_aluno.id = tb_info_alunos.id_alunos WHERE tb_info_alunos.id_alunos= " . $id_aluno_alterar;
            // Cria a consulta SQL para buscar as informações do aluno com o 'id_aluno_alterar'

            $dados = $banco->query($select)->fetch();  
            // Executa a consulta e retorna os dados do aluno (uma linha)

        ?>

        <form action="./aluno-editar.php" method="POST">
        <!-- Formulário que será enviado para o arquivo 'aluno-editar.php' via método POST -->

            <input type="hidden" name="id" value="<?=$dados['id']?>">
            <!-- Campo oculto contendo o 'id' do aluno para garantir que seja enviado com o formulário -->

            <img src="./img/<?= $dados['img'] ?>" alt=" ">
            <!-- Exibe a imagem do aluno, usando o caminho armazenado no banco de dados -->

            <div class="col">
                <label for="img">imagem</label>
                <!-- Label para o campo de imagem -->

                <input type="file" accept="image/*" class="form-control" name="img">
                <!-- Campo de upload de imagem, que permite escolher um arquivo de imagem -->
            </div>

            <label for="nome">Nome:</label>
            <!-- Label para o campo "Nome" -->

            <input type="text" class="form-control" name="nome" value="<?=$dados['nome']?>">
            <!-- Campo de texto para o nome do aluno, já preenchido com o valor do banco de dados -->

            <div class="row mt-2 ">
            <!-- Cria uma linha para organizar os campos de telefone e e-mail -->

                <div class="col">
                    <label for="telefone">Telefone:</label>
                    <!-- Label para o campo "Telefone" -->

                    <input type="number" class="form-control" name="tel" value="<?=$dados['telefone']?>">
                    <!-- Campo para o telefone, preenchido com o valor do banco de dados -->
                </div>

                <div class="col">
                    <label for="email">Email:</label>
                    <!-- Label para o campo "E-mail" -->

                    <input type="email" class="form-control" name="email" value="<?=$dados['email']?>">
                    <!-- Campo de entrada de e-mail, preenchido com o valor do banco de dados -->
                </div>
            </div>

            <div class="row mt-2">
            <!-- Nova linha para organizar os campos de data de nascimento e a opção "Frequente" -->

                <div class="col">
                    <label for="data_nascimento">Data de Nascimento:</label>
                    <!-- Label para o campo "Data de Nascimento" -->

                    <input type="date" class="form-control" name="nasc" value="<?=$dados['nascimento']?>">
                    <!-- Campo de data para a data de nascimento, preenchido com o valor do banco de dados -->
                </div>

                <div class="col my-4 pt-2">
                    <input type="checkbox" class="form-check-input" name="frequente">
                    <!-- Caixa de seleção (checkbox) para indicar se o aluno é frequente -->
                    <label for="frequente">Frequente:</label>
                    <!-- Label para o campo "Frequente" -->
                </div>
            </div>

            <input type="submit">
            <!-- Botão para enviar o formulário -->
        </form>

    </main>
</body>
</html>
