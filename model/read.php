<?php
  include_once 'connectDB.php';

  $id = $_GET['id'];

  $sql = "SELECT * FROM clientes WHERE id = $id";
  $resultado = mysqli_query($connect, $sql);

  if(mysqli_num_rows($resultado) > 0){
    $dados = mysqli_fetch_array($resultado);
    echo json_encode($dados);
  } else {
    echo json_encode(array("error" => "Cliente não encontrado"));
  }
?>