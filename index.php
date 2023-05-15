<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Desafio CRUD</title>

    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
  </head>
  <body>
    <?php
      //Conexao
      include_once 'model/connectDB.php'
    ?>
    <header>
      <h1>Formulário para cadastro de Clientes</h1>
    </header>

    <?php
    if (!empty($alert_message)) {
      echo "<script>alert('$alert_message');</script>";
    }
    ?>

    <form action="model/create.php" method="POST">
      <fieldset>
        <div class="fieldset-wrapper">
          <div class="col-2">
            <div class="input-wrapper">
              <label for="nome">Nome:</label>
              <input type="text" id="nome" name="nome" required>
            </div>
            <div class="input-wrapper">
              <label for="sobrenome">Sobrenome:</label>
              <input type="text" id="sobrenome" name="sobrenome" required>
            </div>
            <div class="input-wrapper">
              <label for="email">E-mail:</label>
              <input type="email" id="email" name="email" required>
            </div>
            <div class="input-wrapper">
              <label for="idade">Idade:</label>
              <input type="number" id="idade" name="idade" required>
            </div>
          </div>
        </div>
      </fieldset>
      <button class="button" type="submit">Enviar</button>
    </form>

    <table>
      <thead>
        <tr>
          <th>Nome</th>
          <th>Sobrenome</th>
          <th>E-mail</th>
          <th>Idade</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>

      <?php
        $sql = "SELECT * FROM clientes";
        $resultado = mysqli_query($connect, $sql);

        if(mysqli_num_rows($resultado) > 0){
          while($dados = mysqli_fetch_array($resultado)){
      ?>
        <tr data-id="<?php echo $dados['id']; ?>">
          <td><?php echo $dados['nome']; ?></td>
          <td><?php echo $dados['sobrenome']; ?></td>
          <td><?php echo $dados['email']; ?></td>
          <td><?php echo $dados['idade']; ?></td>
          <td ><button class="edit" data-id="<?php echo $dados['id']; ?>">Editar</button></td>
          <td><button class="remove" data-id="<?php echo $dados['id']; ?>">Remover</button></td>
        </tr>
      <?php 
          }
        }
      ?>
      </tbody>
    </table>
    <script src="js/scriptdelete.js"></script>
    <script src="js/scriptEdit.js"></script>
  </body>
</html>
