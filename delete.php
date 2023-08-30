<?php
    include 'connect.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM product Where id = '$id'";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
      } else {
        echo "Error deleting record: " . $conn->error;
      }
      
      $conn->close();
?>