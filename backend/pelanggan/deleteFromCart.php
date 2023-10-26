<?php
if (isset($_POST["deleteFromCart"])) {
  $id = $_POST["cartDeleteId"];
  mysqli_query($connect, "DELETE FROM carts WHERE id=$id");

  $accountId = $_SESSION["id"];
  $cartList = mysqli_query($connect, "SELECT * FROM carts WHERE account_id=$accountId");
}
