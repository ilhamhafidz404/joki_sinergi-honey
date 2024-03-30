<?php
require "./../connection.php";

session_start();

if (isset($_POST["submit"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $result = mysqli_query($connect, "SELECT * FROM pelanggan WHERE email='$email' AND password='$password' ");


  if (mysqli_affected_rows($connect)) {
    $_SESSION["login"] = true;
    foreach ($result as $item) {
      $_SESSION["role"] = $item["user_type"];
      $_SESSION["nama"] = $item["nama"];
      $_SESSION["id"] = $item["id_account"];
    }
    if ($_SESSION["role"] == "pelanggan") {
      return header("Location: ./../../pages/pelanggan/index.php");
    } else if ($_SESSION["role"] == "admin") {
      return header("Location: ./../../pages/admin/index.php");
    } else if ($_SESSION["role"] == "pemilik") {
      return header("Location: ./../../pages/pemilik/index.php");
    }
  } else {
    echo '
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script type="text/javascript">

    $(document).ready(function(){
      swal({
        title: "Gagal Login!",
        text: "Email atau Password Salah",
        icon: "error",
        timer: 1500,
        button: false,
      })
    });
    setTimeout(function(){
      history.back()
    }, 2000)
    </script>
  ';
  }
}
