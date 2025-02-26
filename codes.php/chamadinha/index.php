<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<html></html>

<?php

$dns = 'mysql:dbname=db_chamadinha;host=localhost';
$user = 'root';
$password = '';

$banco = new PDO($dns, $user, $password);

$select = 'SELECT * FROM tb_alunos';


$resultado = $banco->query($select)->fetchAll();


// echo'<pre>';
// var_dump($resultado);

?>
<main class="container my-5">
    <table class="table table-striped">
        <tr>
            <td>id</td>
            <td>nome</td>
            <td class="text-center">ações</td>
        </tr>
        <?php foreach ($resultado as $lista) { ?>
            <tr>
                <td><?= $lista['Id_alunos'] ?></td>
                <td><?php echo $lista['Nomes'] ?></td>
                <td class="text-center">
                    <a href="./ficha.php?id_alunos=<?= $lista['Id_alunos'] ?>" class="btn btn-primary">Abrir</a>
                    <a href="#" class="btn btn-warning">Editar</a>
                    <a href="#" class="btn btn-danger">Excluir</a>
                    
                </td>
            </tr>
        <?php } ?>
    </table>
</main>