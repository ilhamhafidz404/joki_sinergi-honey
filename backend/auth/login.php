<?php
require "./../connection.php";

session_start();

if (isset($_POST["submit"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $result = mysqli_query($connect, "SELECT * FROM accounts WHERE email='$email' AND password='$password' ");


  if (mysqli_affected_rows($connect)) {
    $_SESSION["login"] = true;
    foreach ($result as $item) {
      $_SESSION["role"] = $item["role"];
      $_SESSION["nama"] = $item["nama"];
      $_SESSION["id"] = $item["id"];
    }
    if ($_SESSION["role"] == "pelanggan") {
      return header("Location: ./../../pages/pelanggan/index.php");
    } else if ($_SESSION["role"] == "admin") {
      return header("Location: ./../../pages/admin/index.php");
    }
  } else {
    echo "takde";
  }
}
