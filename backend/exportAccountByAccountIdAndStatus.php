<?php
session_start();
// memanggil library FPDF
require('./fpdf/fpdf.php');
include 'connection.php';

// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

$pdf->SetFont('Times', 'B', 13);
$pdf->Cell(200, 10, 'DATA TRANSAKSI', 0, 0, 'C');

$pdf->Cell(10, 15, '', 0, 1);
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(50, 7, 'Nama', 1, 0, 'C');
$pdf->Cell(40, 7, 'Produk', 1, 0, 'C');
$pdf->Cell(30, 7, 'Harga', 1, 0, 'C');
$pdf->Cell(30, 7, 'Expedisi', 1, 0, 'C');
$pdf->Cell(30, 7, 'Metode Bayar', 1, 0, 'C');


$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Times', '', 10);


$accountId = $_SESSION["id"];

$data = mysqli_query($connect, "SELECT  * FROM `order` WHERE status='approve' AND id_account=$accountId");
while ($d = mysqli_fetch_array($data)) {
  $pdf->Cell(50, 6, $d['name_account'], 1, 0);
  $pdf->Cell(40, 6, $d['name_product'], 1, 0);
  $pdf->Cell(30, 6, $d['price_product'], 1, 0);
  $pdf->Cell(30, 6, $d['expedition'], 1, 0);
  $pdf->Cell(30, 6, $d['payment_method'], 1, 1);
}

$pdf->Output();
