<?php
require('../../vendor/TCPDF/tcpdf.php');

// Include Connections.php to establish database connection
require_once '../../config/Connections.php';

// Fetch data from view.php using GET parameter
$id = $_GET['id'];
$query = "SELECT * FROM onlinelisting WHERE no_ppp = '$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);

// Create PDF instance
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);


// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 12);
$pdf->SetTextColor(0, 0, 0);

$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <style>
        .header {display: flex; justify-content: space-between; align-items: center;}
        .logo {text-align: center;}
        .logo img {height: 50px}
        .textTengah {text-align: center;}
        .garis {text-align: left; border: 1px solid black; padding: 8px;}
    </style>
</head>
<body>
    <table class="logo">
        <tr>
            <td>
                <img src="../../img/logo_LJH_Icon_BSD_2-removebg.png" alt="LJ Hooker Icon BSD" style="height:50px;">
            </td>
        </tr>
    </table>

    <table style="width:100%; font-size: 8ft; margin-">
        <tr>
            <th style="width: 75%;">Marketing: '. $row['nama_marketing'] .'</th>
            <th>No. PPP : LJHBSD/PPP/'. $row['tahun_ppp'] .'/'. $row['no_ppp'] . '</th>
        </tr>
        <tr>
            <th style="width: 75%;">No. Telp : (021) 40 000 916</th>
            <th>Email : ljh.iconbsd@gmail.com</th>
        </tr>
    </table>
    
    <table style="width: 100%; font-size: 8ft;">
        <tr>
            <th colspan="2" class="garis textTengah" style="background-color: lightgrey;">Kategori Properti</th>
            <th colspan="3" class="garis" style="background-color: lightgrey;">Data Properti</th>
        </tr>
        <tr>
            <td class="garis">Kategori Listing</td>
            <td class="garis">' . $row['kategoriListing'] . '</td>
            <td class="garis">Luas Tanah</td>
            <td class="garis" colspan="2">' . $row['luasTanah'] . ' m2</td>
        </tr>
        <tr>
            <td class="garis">Jenis Listing</td>
            <td class="garis">' . $row['jenisListing'] . '</td>
            <td class="garis">Luas Bangunan</td>
            <td class="garis" colspan="2">' . $row['luasBangunan'] . ' m2</td>
        </tr>
        <tr>
            <td class="garis">Jangka Waktu</td>
            <td class="garis">' . $row['jangkaWaktu'] . '</td>
            <td class="garis">Lokasi Tanah</td>
            <td class="garis" colspan="2">' . $row['lokasiTanah'] . '</td>
        </tr>
        <tr>
            <td class="garis">Sampai Dengan</td>
            <td class="garis">' . $row['sampaiDengan'] . '</td>
            <td class="garis">Blok</td>
            <td class="garis" colspan="2">' . $row['blok'] . '</td>
        </tr>
        <tr>
            <td class="garis">Jenis Transaksi</td>
            <td class="garis">' . $row['jenisTransaksi'] . '</td>
            <td class="garis">Lantai</td>
            <td class="garis" colspan="2">' . $row['jumlahLantai'] . '</td>
        </tr>
        <tr>
            <td class="garis">Besaran Komisi</td>
            <td class="garis">' . $row['besaranKomisi'] . '%</td>
            <td class="garis">Area</td>
            <td class="garis" colspan="2">' . $row['area'] . '</td>
        </tr>
        <tr>
            <td class="garis">Jenis Properti</td>
            <td class="garis">' . $row['jenisProperti'] . '</td>
            <td class="garis">Hadap / View</td>
            <td class="garis" colspan="2">' . $row['hadapView'] . '</td>
        </tr>
        <tr>
            <td class="garis">Lainnya</td>
            <td class="garis">' . $row['jpLainnya'] . '</td>
            <td class="garis">Alamat Properti</td>
            <td class="garis" colspan="2">' . $row['alamatListingProperti'] . '</td>
        </tr>   
        <tr>
            <th colspan="2" class="garis" style="background-color: lightgrey;">Keterangan Ruangan</th>
            <th colspan="3" class="garis" style="background-color: lightgrey;">Dokumen Kepemilikan</th>
        </tr>
        <tr>
            <td class="garis">Kamar Tidur</td>
            <td class="garis">' . $row['kamarTidur'] . '</td>
            <td class="garis">No. HGB</td>
            <td class="garis">' . $row['noHGB'] . '</td>
            <td class="garis">' . $row['tahunHGB'] . '</td>
        </tr>
        <tr>
            <td class="garis">Kamar Mandi</td>
            <td class="garis">' . $row['kamarMandi'] . '</td>
            <td class="garis">No. PBB</td>
            <td class="garis">' . $row['noPBB'] . '</td>
            <td class="garis">' . $row['tahunPBB'] . '</td>
        </tr>
        <tr>
        <td class="garis">Carport</td>
        <td class="garis">' . $row['carport'] . '</td>
        <td class="garis">No. SHM</td>
        <td class="garis" colspan="2">' . $row['noSHM'] . '</td>
        </tr>
        <tr>
            <td class="garis">Ruang Tamu</td>
            <td class="garis">' . $row['cbRuangTamu'] . '</td>
            <td class="garis">No. IMB</td>
            <td class="garis" colspan="2">' . $row['noIMB'] . '</td>
        </tr>
        <tr>
            <td class="garis">Ruang Kerja</td>
            <td class="garis">' . $row['cbRuangKerja'] . '</td>
            <td class="garis">No. HP</td>
            <td class="garis" colspan="2">' . $row['noHP'] . '</td>
        </tr>
        <tr>
            <td class="garis">Ruang Keluarga</td>
            <td class="garis">' . $row['cbRuangKeluarga'] . '</td>
            <th class="garis" colspan="3" style="background-color: lightgrey;">Dokumen Lainnya</th>
            <td class="garis" rowspan="4">'. $row['dokLainnya'].'</td>
        </tr>
        <tr>
            <td class="garis">Kolam Renang</td>
            <td class="garis">' . $row['cbKolamRenang'] . '</td>
        </tr>
        <tr>
            <td class="garis">Taman</td>
            <td class="garis">' . $row['cbTaman'] . '</td>
        </tr>
        <tr>
            <td class="garis">Teras</td>
            <td class="garis">' . $row['cbTeras'] . '</td>
            <td class="garis" colspan="3" style="background-color: lightgrey;">Informasi Jual / Sewa</td>
        </tr>
        <tr>
            <td class="garis">Gudang</td>
            <td class="garis">' . $row['cbGudang'] . '</td>
            <td class="garis">Harga Jual</td>
            <td class="garis" colspan="3">' . $row['hargaJual']. '</td>
        </tr>
        <tr>
            <td class="garis">Dapur</td>
            <td class="garis">' . $row['cbDapur'] . '</td>
            <td class="garis">Minimal Lama Sewa</td>
            <td class="garis" colspan="3">' . $row['minLamaSewa'] . '</td>
        </tr>
        <tr>
            <td class="garis">Kamar Tidur ART</td>
            <td class="garis">' . $row['kt_pembantu'] . '</td>
            <td class="garis">Deposit</td>
            <td class="garis" colspan="3">' . $row['deposit'] . '</td>
        </tr>
        <tr>
            <td class="garis">Kamar Mandi ART</td>
            <td class="garis">' . $row['km_pembantu'] . '</td>
            <td class="garis">Harga Sewa</td>
            <td class="garis" colspan="3">' . $row['hargaSewa'] . '</td>
        </tr>

        <tr>
            <th colspan="2" class="garis" style="background-color: lightgrey;">Pihak Pemilik Properti (Pihak 1)</th>
            <th colspan="3" class="garis" style="background-color: lightgrey;">Pihak Agent LJ Hooker (Pihak 2)</th>
        </tr>
        <tr>
            <td class="garis">Nama</td>
            <td class="garis">' . $row['namaPemilik'] . '</td>
            <td class="garis">Nama Agen</td>
            <td class="garis" colspan="2">' . $row['namaAgent'] . '</td>
        </tr>
        <tr>
            <td class="garis">No. KTP</td>
            <td class="garis">' . $row['noKTPPemilik'] . '</td>
            <td class="garis">Kantor</td>
            <td class="garis" colspan="2">' . $row['kantorAgent'] . '</td>
        </tr>
        <tr>
            <td class="garis">No. HP</td>
            <td class="garis">' . $row['noHPPemilik'] . '</td>
            <td class="garis">No. HP</td>
            <td class="garis" colspan="2">' . $row['noHPAgent'] . '</td>
        </tr>
        <tr>
            <td class="garis">Telp. Rumah/Kantor</td>
            <td class="garis">' . $row['noTelpRumahPemilik'] . '</td>
            <td class="garis">Telp. Kantor</td>
            <td class="garis" colspan="2">' . $row['telpKantor'] . '</td>
        </tr>
        <tr>
            <td class="garis">Email</td>
            <td class="garis">' . $row['emailPemilik'] . '</td>
            <td class="garis">Email</td>
            <td class="garis" colspan="2">' . $row['emailAgent'] . '</td>
        </tr>
        <tr>
            <td class="garis">Alamat</td>
            <td class="garis">' . $row['alamatPemilik'] . '</td>
            <td class="garis">Alamat</td>
            <td class="garis" colspan="2">' . $row['alamatAgent'] . '</td>
        </tr>
        <tr>
            <th colspan="5" class="garis" style="background-color: lightgrey;">Fasilitas</th>
        </tr>
        <tr>
            <td class="garis">Listrik</td>
            <td class="garis">'. $row['wattListrik'] .'</td>
            <td class="garis">Air Tanah</td>
            <td class="garis" colspan="2">'. $row['cbAirTanah'] .'</td>
        </tr>
        <tr>
            <td class="garis">Telepon</td>
            <td class="garis">'. $row['lineTelepon'] .'</td>
            <td class="garis">Water Heater</td>
            <td class="garis" colspan="2">'. $row['cbWaterHeater'] .'</td>
        </tr>
        <tr>
            <td class="garis">AC</td>
            <td class="garis">'. $row['unitAC'] . '</td>
            <td class="garis">Furnish</td>
            <td class="garis" colspan="2">'. $row['cbFurnished'] . $row['cbUnfurnished'] . $row['cbSemiFurnished'] .'</td>
        </tr>
        <tr>
            <td class="garis">Air PAM</td>
            <td class="garis">' . $row['cbAirPAM'] . '</td>
            <td class="garis">Keterangan Lainnya</td>
            <td class="garis" colspan="2">' . $row['fasKeterangan'] . '</td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="font-size: 8ft"><b>Pihak 1 = Pihak Pemilik Properti.</b></td>
            <td style="font-size: 8ft"><b>Pihak 2 = Pihak Agent LJHooker.</b></td>
        </tr>
    </table>
    <div style="font-size: 7ft">
    Dengan ini Para Pihak setuju dan mengikatkan diri dalam ketentuan di bawah ini : <br>
    1. Pihak 1 menjamin dan menyatakan bahwa :<br>
    
    &nbsp;&nbsp;&nbsp; - adalah pemilik yang sah dan berhak atas
    kepemilikan properti di atas. <br>
    &nbsp;&nbsp;&nbsp; - properti yang dipasarkan tidak dalam sengketa
    dengan Pihak manapun. <br>
    &nbsp;&nbsp;&nbsp; - bertanggung jawab sepenuhnya atas seluruh
    permasalahan sehubungan dengan kepemilikan
    propertinya,
    dan membebaskan Pihak Agent LJ Hooker/Pihak 2 atas permasalahan yang
    timbul.<br>
    
    2. Pihak 1 memberi izin kepada Pihak 2 untuk : <br>
    
    &nbsp;&nbsp;&nbsp; - Memperlihatkan properti, dan mengadakan Open
    House pada saat yang wajar, dengan pemberitahuan
    kepada Pihak 1. <br>
    &nbsp;&nbsp;&nbsp; - Memasang spanduk/papan "DIJUAL/DISEWAKAN"
    dengan pemberitahuan kepada Pihak 1. <br>
    &nbsp;&nbsp;&nbsp; - Mempromosikan properti dengan program yang
    disetujui bersama. <br>
    &nbsp;&nbsp;&nbsp; - Menerima titipan uang muka/uang tanda jadi dari
    pembeli/penyewa melalui rekening kantor Pihak 2
    (tanpa denda jika terjadi pembatalan dari Pihak penjual/pihak
    pembeli). <br>
    &nbsp;&nbsp;&nbsp; - Bersedia membayar media iklan (Ya/Tidak).<br>
    
    3. Untuk jenis permasalah eksklusif dengan ketentuan, sbb : <br>
    
    &nbsp;&nbsp;&nbsp; - Pihak 1 atau pihak manapun yang menjual, maka
    pihak 1 tetap bersedia membayar fee kepada pihak 
    2.
    Fee dibayar selambat - lambatnya 3 (tiga) hari kerja setelah
    pelunasan. <br>
    &nbsp;&nbsp;&nbsp; - Pihak 1 tidak melakukan perjanjian/pengikatan
    dengan agent lain dalam pemasaran propertinya.
    <br>
    &nbsp;&nbsp;&nbsp; - Pihak 1 memberikan masa pemasaran Eksklusif
    dengan jangka waktu 90 hari (sembilan puluh hari) /
    120
    hari (seratus dua puluh hari) sejak di tanda tanganinya form ini.<br>
    
    4. Pihak 1 bersedia menyerahkan data, dokumen pendukung sehubungan
    dengan properti yang di pasarkan pihak 2 (Copy KTP,
    sertifikat, IMB, PBB, dll). <br>
    
    5. Pihak 1 setuju membayar Succes Fee sebesar 3% atau 5% dari Nilai
    Transaksi yang terjadi. Apabila transaksi
    batal/dibatalkan, maka pihak 2 tetap berhak menerima Fee penuh /
    setengah (1/2) dari uang muka / uang tanda jadi, jika
    lebih kecil dari Fee transaksi. Dan fee dibayarkan selambatnya 3 (tiga)
    hari kerja. <br>
    
    6. Apabila pihak 2 berhasil membantu menjualkan Properti Pihak 1, maka
    Pihak 1 berkewajiban membayar Success Fee sebesar
    3% untuk jual, dan 5% untuk sewa dari Nilai Transaksi Properti. Hal ini
    berlaku untuk perpanjangan sewa sepanjang dengan
    penyewa yang sama. Fee akan tetap dibayarkan kepada Pihak 2, sesuai
    pembayaran yang diterima oleh Pihak 1. <br>
    
    7. Pihak 1 diharuskan membayar Fee via transfer ke rekening kantor
    LJHooker ................., bank
    ................., dengan nomor
    ................. Mohon bukti transfer diinfokan kepada pihak 2, atau email kantor .................<br>
    
    8. Setiap perkara yang timbul dari perjanjian ini, maka para pihak
    sepakat untuk mengadakan penyelesaian secara
    musyawarah mufakat.
    <br><br>
    <table>
        <tr>
            <td style="font-size: 7ft">Hari / Tanggal ..............................    </td>
            <td style="font-size: 7ft"><b>Pihak 1 (Pemilik Properti)</b></td>
            <td style="font-size: 7ft"><b>Pihak 2 (Agent LJ Hooker)</b></td>
            <td style="font-size: 7ft"><b>Principal LJ Hooker</b></td>
        </tr><br><br><br>
        <tr>
            <td></td>
            <td>(.......................................................)</td>
            <td>(..........................................................)</td>
            <td>(.................................................)</td>
        </tr>
        <tr>
            <td></td>
            <td>Biru  : Pihak 1 / Pemilik Properti</td>
            <td>Putih : Kantor LJ Hooker</td>
            <td>Merah : LJ Hooker Indonesia</td>
        </tr>
    </table>
</body>
</html>
';

// $play = '<style>' . $css . '</style>' . $html;

$pdf->writeHTML($html, true, false, true, false, '');
// Output to PDF file or display in the browser
// Set header untuk menentukan tipe konten dan memberikan instruksi agar tidak di-download otomatis
header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename=output.pdf'); // inline menginstruksikan agar tidak di-download

// Output atau tampilkan dokumen PDF
$pdf->Output('php://output', 'I');
