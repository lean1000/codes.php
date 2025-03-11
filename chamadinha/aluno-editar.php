<?php

echo '<h1> Aluno Editar </h1>';
// Exibe um título "Aluno Editar" na página

$editarId = $_POST['id'];
$editarNome = $_POST['nome'];
// Obtém os valores enviados via POST para o 'id' e 'nome' do aluno que será editado, armazenando-os em variáveis PHP

$dsn = 'mysql:dbname=db_chamadinha;host=127.0.0.1';
$user = 'root';
$password = '';
// Configurações de conexão com o banco de dados MySQL usando PDO. O 'dsn' especifica o banco de dados 'db_chamadinha' no host local.

$banco = new PDO($dsn, $user, $password);
// Cria uma nova instância de PDO para conectar ao banco de dados

$update = 'UPDATE tb_aluno SET nome = :nome WHERE id = :id';
// Define a consulta SQL para atualizar o nome do aluno na tabela 'tb_aluno'. O parâmetro ':nome' será substituído pelo nome do aluno e ':id' pelo ID do aluno.

$box = $banco->prepare($update);
// Prepara a consulta SQL para execução. O método 'prepare' ajuda a evitar SQL Injection, preparando a consulta com parâmetros

$box->execute([
    ':id' => $editarId,
    ':nome' => $editarNome
]);
// Executa a consulta preparada, passando os valores para os parâmetros ':id' e ':nome' (id e nome do aluno) com base nos dados recebidos via POST

?>
