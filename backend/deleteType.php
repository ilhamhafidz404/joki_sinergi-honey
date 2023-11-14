<?php
$connect = mysqli_connect("localhost", "root", "", "sinergi-honey");
if (isset($_GET["deleteTypeId"])) {
  $deletedType = $_GET["deleteTypeId"];

  mysqli_query($connect, "DELETE FROM  types WHERE id=$deletedType");

  header("Location: ./../pages/admin/listProduct.php");
}
