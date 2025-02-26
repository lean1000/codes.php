<?php
echo'<h1>Cadastro de Aluno<?h1>';
 
var_dump(
    $_POST
);
 
$nomeFormulario = $_POST['nome'];

$dsn = 'mysql:dbname=db_chamadinha;host=localhost';
$user = 'root';
$password = '';
 
$banco = new PDO($dsn, $user , $password);
 
$insert = 'INSERT INTO tb_alunos (Nomes) VALUE (:nome)';
 
$box = $banco->prepare($insert);
 
$box->execute([
    ':nome' => $nomeFormulario
]);
 
$id_alunos = $banco->lastInsertId();
 
echo $id_alunos;

$telefoneFormulario = $_POST['telefone'];
$emailFormulario = $_POST['email'];
$nascimentoFormulario = $_POST['data-nascimento'];
$frequenteFormulario = $_POST['frequente'];
$Id_alunosFormulario = $_POST['Id_alunos'];

$ins = 'INSERT INTO tb_info_alunos (telefone,email,nascimento,frequente,Id_alunos) VALUE (:telefone,:email,:nascimento,:frequente,:Id_alunos)';
 
$caixa = $banco->prepare($ins);
 
$caixa->execute([

    ':telefone' => $telefoneFormulario,
    ':email' => $emailFormulario,
    ':nascimento' => $nascimentoFormulario,
    ':frequente' => $frequenteFormulario,
    ':Id_alunos' => $Id_alunosFormulario

]);

