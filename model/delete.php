<?php
  include_once 'connectDB.php';

  $id = $_GET['id'];

  $sql = "DELETE FROM clientes WHERE id = $id";

  if (mysqli_query($connect, $sql)) {
    $response = array("success" => true);
  } else {
    $response = array("success" => false, "message" => "Erro ao excluir cliente");
  }

  header('Content-Type: application/json');
  echo json_encode($response);
?>