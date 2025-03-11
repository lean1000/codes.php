<?php

echo '<h1>Aluno Deletar.php</h1>';
// Exibe um título "Aluno Deletar.php" na página para indicar que o processo de exclusão de aluno está sendo realizado.

$dsn = 'mysql:dbname=db_chamadinha;host=127.0.0.1';
$user = 'root';
$password = '';
// Configurações de conexão com o banco de dados MySQL usando PDO. O 'dsn' especifica o banco de dados 'db_chamadinha' no host local.

$banco = new PDO($dsn, $user, $password);
// Cria uma nova instância de PDO para conectar ao banco de dados MySQL.

$idFormulario = $_GET['id'];
// Obtém o 'id' do aluno a ser deletado a partir da URL via método GET (geralmente passado como parte da query string).

$delete = 'DELETE FROM tb_aluno WHERE id = :id';
// Define a consulta SQL para deletar o aluno na tabela 'tb_aluno', onde o 'id' corresponde ao aluno que será excluído.

$box = $banco->prepare($delete);
// Prepara a consulta SQL para execução, utilizando **prepare** para evitar SQL Injection.

$box->execute([
    ':id' => $idFormulario
]);
// Executa a consulta preparada, passando o valor do 'id' que foi obtido da URL via GET, para o parâmetro ':id'.

$delete = 'DELETE FROM tb_info_alunos WHERE id_alunos = :id_alunos'; 
// Define outra consulta SQL para deletar as informações do aluno na tabela 'tb_info_alunos', onde o 'id_alunos' corresponde ao 'id' passado.

$box = $banco->prepare($delete);
// Prepara a consulta SQL para execução novamente.

$box->execute([
    ':id_alunos' => $idFormulario
]);
// Executa a consulta preparada para excluir as informações do aluno na tabela 'tb_info_alunos' usando o mesmo 'id' que foi obtido.

echo '<script>
    alert("Usuário apagado com sucesso!")
    window.location.replace("index.php")
</script>';
// Exibe uma mensagem de alerta dizendo que o aluno foi deletado com sucesso e, em seguida, redireciona o usuário para a página 'index.php'.
?>