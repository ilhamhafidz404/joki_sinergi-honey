<?php
// memanggil library FPDF
require('./fpdf/fpdf.php');
include 'connection.php';

// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

$pdf->SetFont('Times', 'B', 13);
$pdf->Cell(200, 10, 'LAPORAN PENJUALAN', 0, 0, 'C');


$products = mysqli_query($connect, "SELECT * FROM products");
$listProduct = [];
foreach ($products as $key => $product) {
  $listProduct[$key] = $product["nama"];
}

// var_dump(count($listProduct));

$dataTransaksiProduk = [];
$dataTransaksiProdukTerjual = [];

for ($i = 0; $i < count($listProduct); $i++) {
  $result = mysqli_query($connect, "SELECT * FROM transactions WHERE product_name='$listProduct[$i]'");
  $dataTransaksiProduk[$i] = mysqli_num_rows($result);
  $dataTransaksiProdukTerjual[$i] = 0;
}

for ($i = 0; $i < count($listProduct); $i++) {
  $result = mysqli_query($connect, "SELECT * FROM transactions WHERE product_name='$listProduct[$i]'");

  foreach ($result as $key => $value) {
    $dataTransaksiProdukTerjual[$i] += $value["jumlah"];
  }
}

// var_dump($dataTransaksiProdukTerjual);


$pdf->Cell(10, 15, '', 0, 1);
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(50, 7, 'Nama Produk', 1, 0, 'C');
$pdf->Cell(40, 7, 'Terjual', 1, 0, 'C');
$pdf->Cell(50, 7, 'Harga', 1, 0, 'C');
$pdf->Cell(50, 7, 'Sub Total', 1, 0, 'C');


$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Times', '', 10);

$jumlahTotal = 0;
foreach ($products as $key => $product) {
  // $listProduct[$key] = $product["nama"];
  $pdf->Cell(50, 6, $listProduct[$key], 1, 0);
  $pdf->Cell(40, 6, $dataTransaksiProdukTerjual[$key], 1, 0);
  $pdf->Cell(50, 6, "Rp " . number_format($product['harga']), 1, 0);
  $pdf->Cell(50, 6, "Rp " . number_format($product['harga'] * $dataTransaksiProdukTerjual[$key]), 1, 1);

  $jumlahTotal += $product['harga'] * $dataTransaksiProdukTerjual[$key];
}
$pdf->Cell(90, 6, "Jumlah", 1, 0, 'C');
$pdf->Cell(100, 6, "Rp " . number_format($jumlahTotal), 1, 1, 'C');

$pdf->Output();
