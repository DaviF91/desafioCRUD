<?php
  // Conexão com o banco de dados
  $servername = "localhost";
  $username = "root";
  $password = ""; // Sugiro deixar sem
  $db_name = "crud-app";
  $connect = mysqli_connect($servername, $username, $password, $db_name);
  mysqli_set_charset($connect, "utf8");
  if (mysqli_connect_error()) {
    echo "erro na conexão: ".mysqli_connect_error();
  }
?>