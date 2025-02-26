<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chamadinha - Cadastro</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Cadastro - Chamadinha</h1>
        <form action="./aluno-cadastrar.php" method="post">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="number" id="telefone" name="telefone" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="data-nascimento">Data de Nascimento:</label>
                <input type="date" id="data-nascimento" name="data-nascimento" required>
            </div>
            <div class="form-group">
                <label class="checkbox-container">
                    <input type="checkbox" id="frequencia" name="frequencia" required>
                    Frequência
                    <span class="checkmark"></span>
                </label>
            </div>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>

</html>