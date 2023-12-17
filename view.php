<?php
session_start();
// Pastikan pengguna sudah login
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>View Data Listing</title>

    <!-- Custom fonts for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <style>
        .custom-navbar {
            background-color: red;
            /* Change the background color to red */
        }

        .custom-navbar .navbar-nav .nav-link {
            color: white !important;
            /* Change the text color to white */
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">
                            <img src="../img/LJ_Hooker_logo-removebg-preview.png" alt="logo" width="150" height="40">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="viewDataListing.php">Data Listing</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="register.php">Create Account</a>
                                </li>
                                <li class="nav-item">
                                    <div class="topbar-divider d-none d-sm-block"></div>
                                </li>
                                <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="mr-2 d-none d-lg-inline text-gray-700 "><?php echo $_SESSION['username']; ?></span>
                                        <img class="img-profile rounded-circle" src="../img/undraw_profile.svg" width="25" height="25">
                                    </a>
                                    <!-- Dropdown - User Information -->
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Logout
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container mt-5">

                    <div class="row">
                        <div class="col-lg">
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3" style="display: flex; justify-content: space-between; align-items: center;">
                                    <h6 class="m-0 font-weight-bold text-primary" style="margin: 0;">View Data Listing</h6>
                                    <button type="button" onclick="generatePDF()" style="padding: 8px 12px; background-color: #007bff; color: #fff; border: none; cursor: pointer; border-radius: 4px;">Generate PDF</button>
                                </div>


                                <div class="card-body" id="content" style="margin: 20px;">
                                    <?php
                                    require_once '../config/Connections.php';

                                    $id = $_GET['id'];

                                    $query = "SELECT no_ppp, tahun_ppp, nama_marketing, kategoriListing, jenisTransaksi, jenisListing, besaranKomisi, jangkaWaktu, sampaiDengan,jenisProperti, luasTanah, luasBangunan, area, blok, hadapView, jumlahLantai, alamatListingProperti, hargaJual, minLamaSewa, deposit, hargaSewa, noSHM,noHGB, tahunHGB, noIMB, noPBB, tahunPBB, noHP, dokLainnya, kamarTidur, kamarMandi, carport, cbRuangTamu, cbRuangKeluarga, cbRuangKerja, cbKolamRenang,cbTaman, cbTeras, cbGudang, cbDapur, kt_pembantu, km_pembantu, wattListrik, lineTelepon, unitAC, cbFurnished, cbUnfurnished, cbSemiFurnished, cbAirPAM, cbAirTanah, cbWaterHeater, fasKeterangan, namaPemilik, noKTPPemilik, noHPPemilik, noTelpRumahPemilik, emailPemilik, alamatPemilik, namaAgent,kantorAgent, noHPAgent, telpKantor, emailAgent, alamatAgent FROM onlinelisting WHERE no_ppp = ?";
                                    $stmt = mysqli_prepare($conn, $query);
                                    mysqli_stmt_bind_param($stmt, "s", $id);
                                    mysqli_stmt_execute($stmt);
                                    mysqli_stmt_bind_result($stmt, $no_ppp, $tahun_ppp, $nama_marketing, $kategoriListing, $jenisTransaksi, $jenisListing, $besaranKomisi, $jangkaWaktu, $sampaiDengan, $jenisProperti, $luasTanah, $luasBangunan, $area, $blok, $hadapView, $jumlahLantai, $alamatListingProperti, $hargaJual, $minLamaSewa, $deposit, $hargaSewa, $noSHM, $noHGB, $tahunHGB, $noIMB, $noPBB, $tahunPBB, $noHP, $dokLainnya, $kamarTidur, $kamarMandi, $carport, $cbRuangTamu, $cbRuangKeluarga, $cbRuangKerja, $cbKolamRenang, $cbTaman, $cbTeras, $cbGudang, $cbDapur, $kt_pembantu, $km_pembantu, $wattListrik, $lineTelepon, $unitAC, $cbFurnished, $cbUnfurnished, $cbSemiFurnished, $cbAirPAM, $cbAirTanah, $cbWaterHeater, $fasKeterangan, $namaPemilik, $noKTPPemilik, $noHPPemilik, $noTelpRumahPemilik, $emailPemilik, $alamatPemilik, $namaAgent, $kantorAgent, $noHPAgent, $telpKantor, $emailAgent, $alamatAgent);

                                    if (mysqli_stmt_fetch($stmt)) {
                                        echo "<div class='table-responsive'>";
                                        echo "<table class='table table-bordered'>";
                                        echo "<thead class='thead-light'>";
                                        echo "<tr>";
                                        echo "<th scope='col'>Attribute</th>";
                                        echo "<th scope='col'>Value</th>";
                                        echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody>";

                                        $rows = array(
                                            'No. PPP' => $no_ppp,
                                            'Tahun PPP' => $tahun_ppp,
                                            'Nama Marketing' => $nama_marketing,
                                            'Kategori Listing' => $kategoriListing,
                                            'Jenis Transaksi' => $jenisTransaksi,
                                            'Jenis Listing' => $jenisListing,
                                            'Besaran Komisi' => $besaranKomisi,
                                            'Jangka Waktu' => $jangkaWaktu,
                                            'Sampai Dengan' => $sampaiDengan,
                                            'Jenis Properti' => $jenisProperti,
                                            'Luas Tanah' => $luasTanah,
                                            'Luas Bangunan' => $luasBangunan,
                                            'Area' => $area,
                                            'Blok' => $blok,
                                            'Hadap / View' => $hadapView,
                                            'Jumlah Lantai' => $jumlahLantai,
                                            'Alamat Listing Propert' => $alamatListingProperti,
                                            'Harga Jual' => $hargaJual,
                                            'Minimal Harga Sewa' => $minLamaSewa,
                                            'Deposit' => $deposit,
                                            'Harga Sewa' => $hargaSewa,
                                            'No. SHM' => $noSHM,
                                            'No. HGB' => $noHGB,
                                            'Tahun HGB' => $tahunHGB,
                                            'No. IMB' => $noIMB,
                                            'No. PBB' => $noPBB,
                                            'Tahun PBB' => $tahunPBB,
                                            'No. HP' => $noHP,
                                            'Dokumen Lainnya' => $dokLainnya,
                                            'Kamar Tidur' => $kamarTidur,
                                            'Kamar Mandi' => $kamarMandi,
                                            'Carport' => $carport,
                                            'Ruang Tamu' => $cbRuangTamu,
                                            'Ruang Keluarga' => $cbRuangKeluarga,
                                            'Ruang Kerja' => $cbRuangKerja,
                                            'Kolam Renang' => $cbKolamRenang,
                                            'Taman' => $cbTaman,
                                            'Teras' => $cbTeras,
                                            'Gudang' => $cbGudang,
                                            'Dapur' => $cbDapur,
                                            'Kamar Tidur ART' => $kt_pembantu,
                                            'Kamar Mandi ART' => $km_pembantu,
                                            'Listrik' => $wattListrik,
                                            'Telepon' => $lineTelepon,
                                            'Unit AC' => $unitAC,
                                            'Furnished' => $cbFurnished,
                                            'Unfurnished' => $cbUnfurnished,
                                            'Semi-Furnished' => $cbSemiFurnished,
                                            'Air PAM' => $cbAirPAM,
                                            'Air Tanah' => $cbAirTanah,
                                            'Water Heater' => $cbWaterHeater,
                                            'Keterangan' => $fasKeterangan,
                                            'Nama Pemilik' => $namaPemilik,
                                            'No. KTP Pemilik' => $noKTPPemilik,
                                            'No. HP Pemilik' => $noHPPemilik,
                                            'No. Telp Rumah Pemilik' => $noTelpRumahPemilik,
                                            'Email Pemilik' => $emailPemilik,
                                            'Alamat Pemilik' => $alamatPemilik,
                                            'Nama Agent' => $namaAgent,
                                            'Kantor Agent' => $kantorAgent,
                                            'No. HP Agent' => $noHPAgent,
                                            'Telp. Kantor' => $telpKantor,
                                            'Email Agent' => $emailAgent,
                                            'Alamat Agent' => $alamatAgent
                                        );

                                        foreach ($rows as $attribute => $value) {
                                            echo "<tr>";
                                            echo "<th scope='row'>" . htmlspecialchars($attribute, ENT_QUOTES, 'UTF-8') . "</th>";
                                            echo "<td>" . htmlspecialchars($value, ENT_QUOTES, 'UTF-8') . "</td>";
                                            echo "</tr>";
                                        }

                                        echo "</tbody>";
                                        echo "</table>";
                                        echo "</div>";
                                    } else {
                                        echo "Data not found.";
                                    }

                                    mysqli_stmt_close($stmt);
                                    mysqli_close($conn);
                                    ?>
                                </div>
                                <div class="container">
                                    <p><b>Pihak 1 = Pihak Pemilik Properti. &ensp;&ensp; Pihak 2 = Pihak
                                            Agent LJHooker.</b></p>
                                    <p>
                                        Dengan ini Para Pihak setuju dan mengikatkan diri dalam ketentuan di
                                        bawah ini : <br>
                                        1. Pihak 1 menjamin dan menyatakan bahwa :
                                    <p>
                                        &nbsp;&nbsp;&nbsp; - Adalah pemilik yang sah dan berhak atas
                                        kepemilikan properti di atas. <br>
                                        &nbsp;&nbsp;&nbsp; - Properti yang dipasarkan tidak dalam sengketa
                                        dengan Pihak manapun. <br>
                                        &nbsp;&nbsp;&nbsp; - Bertanggung jawab sepenuhnya atas seluruh
                                        permasalahan sehubungan dengan kepemilikan
                                        propertinya,
                                        dan membebaskan Pihak Agent LJ Hooker/Pihak 2 atas permasalahan yang
                                        timbul.
                                    </p>
                                    2. Pihak 1 memberi izin kepada Pihak 2 untuk :
                                    <p>
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
                                        &nbsp;&nbsp;&nbsp; - Bersedia membayar media iklan (Ya/Tidak).
                                    </p>
                                    3. Untuk jenis permasalah eksklusif dengan ketentuan, sbb :
                                    <p>
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
                                        hari (seratus dua puluh hari) sejak di tanda tanganinya form ini.
                                    </p>
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
                                    LJHooker ................................, bank
                                    ................................, dengan nomor
                                    ................................ <br>
                                    8. Setiap perkara yang timbul dari perjanjian ini, maka para pihak
                                    sepakat untuk mengadakan penyelesaian secara
                                    musyawarah mufakat.
                                    </p> <br><br>
                                    <p style="text-align: right;">
                                        Hari / Tanggal ......................................................................
                                    </p>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <b>Pihak 1 (Pemilik Properti)</b><br><br><br><br><br>
                                            <div class="signature">
                                                <p>(...................................................)</p>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <b>Pihak 2 (Agent LJ Hooker)</b><br><br><br><br><br>
                                            <div class="signature">
                                                <p>(...................................................)</p>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <b>Principal LJ Hooker</b><br><br><br><br><br>
                                            <div class="signature">
                                                <p>(...................................................)</p>
                                            </div>
                                        </div>

                                        <p class="color-legend">
                                            <i>Putih : Kantor LJ Hooker</i>
                                            <i>Merah : LJ Hooker Indonesia</i>
                                            <i>Biru : Pihak 1 / Pemilik Properti</i>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; LJH ICON BSD 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });

        async function generatePDF() {
            const {
                PDFDocument
            } = PDFLib;

            // Membuat dokumen PDF baru
            const pdfDoc = await PDFDocument.create();
            const page = pdfDoc.addPage();

            // Menambahkan teks ke halaman
            const {
                font,
                rgb
            } = PDFLib;
            const helveticaFont = await pdfDoc.embedFont(font.Helvetica);
            const textSize = 30;
            const text = "Hello, PDF!";
            page.drawText(text, {
                x: 50,
                y: 500,
                font: helveticaFont,
                fontSize: textSize,
                color: rgb(0, 0, 0)
            });

            // Menghasilkan ArrayBuffer dari dokumen PDF
            const pdfBytes = await pdfDoc.save();

            // Mengonversi ArrayBuffer ke Uint8Array
            const pdfData = new Uint8Array(pdfBytes);

            // Membuat objek Blob dari Uint8Array
            const pdfBlob = new Blob([pdfData], {
                type: 'application/pdf'
            });

            // Membuat URL objek Blob
            const pdfUrl = URL.createObjectURL(pdfBlob);

            // Membuat tautan untuk mengunduh PDF
            const downloadLink = document.createElement('a');
            downloadLink.href = pdfUrl;
            downloadLink.download = 'example.pdf';
            downloadLink.textContent = 'Download PDF';

            // Menambahkan tautan ke DOM
            document.body.appendChild(downloadLink);
        }
    </script>
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>