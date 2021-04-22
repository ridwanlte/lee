<?php

require('../assets/fpdf/fpdf.php');
include_once '../model/generateModel.php';
$db = new generateModel();

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 5, 'Daftar Pemenang Lelang', '0', '1', 'C', false);
$pdf->Setfont('Arial', 'B', 10);
$pdf->ln(5);
$pdf->cell(190, 0.6, '', '0', '1', 'c', true);
$pdf->ln(5);


$pdf->SetFont('Arial', 'B', 10);
$pdf->cell(45, 6, 'Nama Barang', 1, 0, 'C');
$pdf->cell(45, 6, 'Harga Akhir', 1, 0, 'C');
$pdf->cell(45, 6, 'Nama User', 1, 0, 'C');
$pdf->cell(45, 6, 'Nama Petugas', 1, 0, 'C');

if ($db->print()->num_rows>0){
    foreach ($db->print() as $row){
    $pdf->ln(6);
    $pdf->SetFont('Arial', '', 10);
    $pdf->cell(45, 6, $row['nama_barang'], 1, 0, 'L');
    $pdf->cell(45, 6, $row['hrg_akhir'], 1, 0, 'L');
    $pdf->cell(45, 6, $row['nama_lengkap'], 1, 0, 'L');
    $pdf->cell(45, 6, $row['nama_petugas'], 1, 0, 'L');
}}
$pdf->Output();
?>