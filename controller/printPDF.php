<?php
include('../config/Connections.php');
require '../vendor/autoload.php';

// Membuat objek DOMPDF
$dompdf = new Dompdf\Dompdf();

// HTML yang akan diubah menjadi PDF
$html = '<html><body><h1>Hello, World!</h1></body></html>';

// Memuat HTML ke DOMPDF
$dompdf->loadHtml($html);

// Mengatur ukuran dan orientasi halaman PDF
$dompdf->setPaper('A4', 'portrait');

// Merender PDF (membuat PDF)
$dompdf->render();

// Menyimpan file PDF ke server
$output = $dompdf->output();
file_put_contents('example.pdf', $output);

// Memberikan tautan untuk mengunduh file PDF
echo '<a href="example.pdf" download>Unduh PDF</a>';
