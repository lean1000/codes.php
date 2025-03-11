<!DOCTYPE html>
<html lang="pt-br">
  <!-- Inicia o documento HTML e define o idioma como português brasileiro -->
  <head>
    <meta charset="UTF-8">
    <!-- Define o charset para UTF-8 (suporta caracteres especiais como acentos e outros símbolos) -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Configura a viewport para tornar o site responsivo em dispositivos móveis -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Importa o CSS do Bootstrap para estilização responsiva e de componentes prontos -->

    <title>Formulário</title>
    <!-- Define o título da página que aparece na aba do navegador -->
    
    <style>
      /* Estilos adicionais específicos para esta página */
      main {
        display: flex;
        flex-direction: column;
        align-items: center;
      }
      /* Configura o layout do container principal para centralizar os elementos */

      form {
        width: 600px;
      }
      /* Define uma largura fixa de 600px para o formulário */

      img {
        width: 200px;
        object-fit: cover;
      }
      /* Ajusta a exibição da imagem */
    </style>
  </head>

  <body>

    <main class="container text-center my-5">
      <!-- Container principal do formulário, com centralização de texto e margens -->

      <h2>CADASTRAR ALUNO</h2>
      <br>

      <form action="./aluno-cadastrar.php" method="POST">
        <!-- O formulário envia os dados via método POST para o arquivo 'aluno-cadastrar.php' -->

        <!-- Campo para selecionar uma imagem -->
        <div class="col">
          <label for="img">Imagem</label>
          <input type="file" accept="image/*" class="form-control" name="img">
          <!-- O campo aceita arquivos do tipo imagem -->
        </div>

        <!-- Campo para Nome -->
        <div class="mb-3">
          <label for="nome" class="form-label">Nome:</label>
          <input type="text" class="form-control" name="nome">
          <!-- Campo de entrada de texto para o nome do aluno -->
        </div>

        <div class="row mt-2">
          <!-- Cria uma linha para os campos de telefone e email -->

          <!-- Campo para Telefone -->
          <div class="col">
            <label for="telefone" class="form-label">Telefone:</label>
            <input type="number" class="form-control" name="tel">
            <!-- Campo para entrada do telefone, com tipo numérico -->
          </div>

          <!-- Campo para Email -->
          <div class="col">
            <label for="email" class="form-label">E-mail:</label>
            <input type="email" class="form-control" name="email">
            <!-- Campo para entrada do email, com tipo específico para email -->
          </div>
        </div>

        <div class="row mt-2">
          <!-- Cria uma nova linha para os campos de dados de nascimento e a opção "Frequente" -->

          <!-- Campo para Data de Nascimento -->
          <div class="col">
            <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
            <input type="date" class="form-control" name="nasc">
            <!-- Campo para selecionar um dado (data de nascimento) -->
          </div>

          <!-- Caixa de seleção (checkbox) para indicar se o aluno é frequente -->
          <div class="col my-4 pt-2">
            <input type="checkbox" class="form-check-input" name="frequente">
            <label for="frequente" class="form-check-label">Frequente:</label>
            <!-- Label para a caixa de seleção -->
          </div>
        </div>

        <!-- Botão de envio do formulário -->
        <button type="submit" class="btn btn-primary mt-3">Cadastrar</button>
        <!-- Botão estilizado do Bootstrap para enviar o formulário -->
      </form>
    </main>

  </body>
</html>
