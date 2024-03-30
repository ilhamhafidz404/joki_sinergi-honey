<?php
$connect = mysqli_connect("localhost", "root", "", "sinergi-honey");
if (isset($_GET["deleteTypeId"])) {
  $deletedType = $_GET["deleteTypeId"];

  mysqli_query($connect, "DELETE FROM  jenis_produk WHERE id_type=$deletedType");

  header("Location: ./../pages/admin/listProduct.php");
}
