<?php
  include_once 'connectDB.php';

  $id = $_GET['id'];
  $nome = $_POST['nome'];
  $sobrenome = $_POST['sobrenome'];
  $email = $_POST['email'];
  $idade = $_POST['idade'];

  $sql = "UPDATE clientes SET nome='$nome', sobrenome='$sobrenome', email='$email', idade=$idade WHERE id=$id";

  if (mysqli_query($connect, $sql)) {
    $alert_message = "Cliente atualizado com sucesso";
  } else {
    $alert_message = "Erro ao atualizar cliente";
  }
  
  header('Location: ../index.php');
?>
