<?php
  require "./../connection.php";
  $id= $_GET["id"];

  mysqli_query($connect, "DELETE FROM products WHERE id=$id");

  header("Location: ./../../pages/admin/listProduct.php");
