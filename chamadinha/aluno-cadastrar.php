<?php
echo "Cadastro de Aluno";
// Exibe o texto "Cadastro de Aluno" na página para informar ao usuário qual processo está sendo realizado.

echo '<pre>';
var_dump($_POST);
// Exibe a estrutura da variável global `$_POST`, que contém os dados enviados pelo formulário. `var_dump` é útil para depuração, mostrando o conteúdo da variável de forma legível.

$nomeFormulario = $_POST['nome'];
// Atribui o valor enviado pelo formulário no campo 'nome' para a variável `$nomeFormulario`.

$dsn = 'mysql:dbname=db_chamadinha;host=127.0.0.1';
$user = 'root';
$password = '';
// Configurações para conexão com o banco de dados MySQL. `dsn` é o nome do banco de dados, e o `host` é a localização do servidor de banco de dados (local, no caso).

$banco = new PDO($dsn, $user, $password);
// Cria uma instância de PDO para conectar-se ao banco de dados com as configurações fornecidas.

$insert='INSERT INTO tb_aluno (nome) VALUE (:nome)';
// Define uma consulta SQL para inserir um novo aluno na tabela `tb_aluno`, apenas com o nome (campo `nome`).

$box = $banco->prepare($insert);
// Prepara a consulta SQL para execução, usando PDO, que ajuda a evitar problemas de segurança como SQL Injection.

$box->execute([
    ':nome' => $nomeFormulario
]);
// Executa a consulta preparada, passando o valor de `$nomeFormulario` para o parâmetro `:nome`.

$id_aluno = $banco->lastInsertId();
// Obtém o ID do último aluno inserido no banco, que será usado para inserir informações relacionadas ao aluno em outra tabela.

echo $id_aluno;
// Exibe o ID do aluno recém-inserido para confirmação de que o aluno foi adicionado corretamente.

$telefoneFormulario = $_POST['tel'];
$emailFormulario = $_POST['email'];
$nascimentoFormulario = $_POST['nasc'];
$frequenteFormulario = $_POST['frequente'];
// Obtém os valores dos campos `tel`, `email`, `nasc`, e `frequente` do formulário e os armazena em variáveis.

$imgFormulario = $_POST['img'];
// Obtém o valor do campo `img` enviado pelo formulário (presumivelmente, o caminho ou nome do arquivo da imagem).

$insert='INSERT INTO tb_info_alunos (telefone, email, nascimento, frequente, id_alunos, img) VALUE (:telefone, :email, :nascimento, :frequente, :id_alunos, :img)';
// Define a consulta SQL para inserir as informações adicionais do aluno na tabela `tb_info_alunos`. Ela inclui os dados de telefone, email, nascimento, status de frequência, ID do aluno (relacionado ao aluno inserido anteriormente) e a imagem.

$boxe = $banco->prepare($insert);
// Prepara a consulta SQL para inserção das informações adicionais do aluno.

$boxe->execute([
    ':telefone' => $telefoneFormulario,
    ':email' => $emailFormulario,
    ':nascimento' => $nascimentoFormulario,
    ':frequente' => $frequenteFormulario,
    ':id_alunos' => $id_aluno,  // Passando o ID do aluno inserido anteriormente
    'img' => $imgFormulario,
]);
// Executa a consulta preparada, passando os valores dos campos do formulário para os parâmetros correspondentes na consulta SQL.
?>
