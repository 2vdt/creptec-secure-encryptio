<?php
$host ='localhost';
  $user = 'root';
  $pass = '';
  $db = 'cryptec-secure-encryptor';
  // $conn = new mysqli($host, $user, $pass, $db);
  // mysqli_query($conn, $sql);]
  $conn = mysqli_connect($host, $user, $pass, $db);

  if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>