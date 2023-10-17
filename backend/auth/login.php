<?php
require "./../connection.php";

session_start();

if (isset($_POST["submit"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $result = mysqli_query($connect, "SELECT * FROM accounts WHERE email='$email' AND password='$password' ");

  foreach ($result as $item) {
    $_SESSION["role"] = $item["role"];
  }

  if (mysqli_affected_rows($connect)) {
    if ($_SESSION["role"] == "pelanggan") {
      return header("Location: ./../../pages/pelanggan/index.php");
    }
  } else {
    echo "takde";
  }
}
