<?php
// Conexão com o banco de dados
include_once 'connectDB.php';


// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Obtém os valores dos campos do formulário
  $nome = $_POST['nome'];
  $sobrenome = $_POST['sobrenome'];
  $email = $_POST['email'];
  $idade = $_POST['idade'];

  // Insere os valores na tabela "cliente"
  $sql = "INSERT INTO clientes (nome, sobrenome, email, idade) VALUES ('$nome', '$sobrenome', '$email', '$idade')";
  $resultado = mysqli_query($connect, $sql);

  // Verifica se a inserção foi bem sucedida e retorna para tela da tabela
  if ($resultado) {
    header('Location: ../index.php');
    exit();
  } else {
    echo "Erro ao inserir dados: " . mysqli_error($connect);
  }

  // Fecha a conexão com o banco de dados
  mysqli_close($connect);
}
?>