<?php
// memanggil library FPDF
require('./fpdf/fpdf.php');
include 'connection.php';

// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

// Mendapatkan lebar halaman
$pageWidth = $pdf->GetPageWidth();

// Mengatur lebar gambar agar sesuai dengan lebar halaman PDF
$imageWidth = $pageWidth - 2 * 0;

$pdf->Image('./../assets/images/kopsurat.jpeg', 0, 10, $imageWidth); // Ganti 'path/to/logo.png' dengan path gambar Anda, (x, y, width)

// Membuat jarak antara gambar dan judul
$pdf->SetY(50); // Sesuaikan nilai Y untuk memberikan jarak yang cukup antara gambar dan judul


$pdf->SetFont('Times', 'B', 13);
$pdf->Cell(200, 10, 'DATA TRANSAKSI', 0, 0, 'C');

$pdf->Cell(10, 15, '', 0, 1);
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(30, 7, 'Tanggal', 1, 0, 'C');
$pdf->Cell(30, 7, 'Nama', 1, 0, 'C');
$pdf->Cell(40, 7, 'Produk', 1, 0, 'C');
$pdf->Cell(20, 7, 'Jumlah Beli', 1, 0, 'C');
$pdf->Cell(20, 7, 'Bayar', 1, 0, 'C');
$pdf->Cell(20, 7, 'Expedisi', 1, 0, 'C');
$pdf->Cell(30, 7, 'Metode Bayar', 1, 0, 'C');


$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Times', '', 10);

$id = $_GET['id'];

$data = mysqli_query($connect, "SELECT  * FROM `order` WHERE id_order=$id");
while ($d = mysqli_fetch_array($data)) {
  $pdf->Cell(30, 6, $d['tanggal'], 1, 0);
  $pdf->Cell(30, 6, $d['name_account'], 1, 0);
  $pdf->Cell(40, 6, $d['name_product']." (".$d['price_product'].")", 1, 0);
  $pdf->Cell(20, 6, $d['jumlah'], 1, 0);
  $pdf->Cell(20, 6, $d['price_product'] * $d['jumlah'], 1, 0);
  $pdf->Cell(20, 6, $d['expedition'], 1, 0);
  $pdf->Cell(30, 6, $d['payment_method'], 1, 1);
}

$pdf->Output();

