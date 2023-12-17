<?php
session_start();
// Pastikan pengguna sudah login
require '../config/Connections.php';
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Handle form submission and insert data into the database
    // Add your form validation and data sanitization here
    $nama_marketing = isset($_POST['namaMarketing']) ? $_POST['namaMarketing'] : '-';
    $tahun_ppp = isset($_POST['tahun_ppp']) ? $_POST['tahun_ppp'] : '-';
    $no_ppp = isset($_POST['no_ppp']) ? $_POST['no_ppp'] : '-';
    $kategoriListing =  isset($_POST['kategoriListing']) ? $_POST['kategoriListing'] : '-';
    $jenisTransaksi = isset($_POST['jenisTransaksi']) ? $_POST['jenisTransaksi'] : '-';
    $jenisListing = isset($_POST['jenisListing']) ? $_POST['jenisListing'] : '-';
    $besaranKomisi = isset($_POST['besaranKomisi']) ? $_POST['besaranKomisi'] : '-';
    $jangkaWaktu = isset($_POST['jangkaWaktu']) ? $_POST['jangkaWaktu'] : '-';
    $jangkaWaktu2 = isset($_POST['jangkaWaktu2']) ? $_POST['jangkaWaktu2'] : '-';
    $jenisProperti = isset($_POST['jenisProperti']) ? $_POST['jenisProperti'] : '-';
    $luasTanah = isset($_POST['luasTanah']) ? $_POST['luasTanah'] : '-';
    $luasBangunan = isset($_POST['luasBangunan']) ? $_POST['luasBangunan'] : '-';
    $area = isset($_POST['area']) ? $_POST['area'] : '-';
    $blok = isset($_POST['blok']) ? $_POST['blok'] : '-';
    $hadapView = isset($_POST['hadapView']) ? $_POST['hadapView'] : '-';
    $jumlahLantai = isset($_POST['jumlahLantai']) ? $_POST['jumlahLantai'] : '-';
    $alamatListingProperti = isset($_POST['alamatListingProperti']) ? $_POST['alamatListingProperti'] : '-';
    $hargaJual = isset($_POST['hargaJual']) ? $_POST['hargaJual'] : '-';
    $lokasiTanah = isset($_POST['lokasiTanah']) ? $_POST['lokasiTanah'] : "-";
    $minLamaSewa = isset($_POST['minimalLamaSewa']) ? $_POST['minimalLamaSewa'] : '-';
    $deposit = isset($_POST['deposit']) ? $_POST['deposit'] : '-';
    $hargaSewa = isset($_POST['hargaSewa']) ? $_POST['hargaSewa'] : '-';
    $cbSHM = isset($_POST['cbSHM']) ? "Tersedia" : '-';
    $noSHM = isset($_POST['noSHM']) ? $_POST['noSHM'] : '-';
    $cbHGB = isset($_POST['cbHGB'])  ? 'Tersedia' : '-';
    $noHGB = isset($_POST['noHGB']) ? $_POST['noHGB'] : '-';
    $tahunHGB = isset($_POST['tahunHGB']) ? $_POST['tahunHGB'] : '-';
    $noIMB = isset($_POST['noIMB']) ? $_POST['noIMB'] : '-';
    $cbIMB = isset($_POST['cbIMB']) ? 'Tersedia' : '-';
    $noPBB = isset($_POST['noPBB']) ? $_POST['noPBB'] : '-';
    $cbPBB = isset($_POST['cbPBB']) ? 'Tersedia' : '-';
    $tahunPBB = isset($_POST['tahunPBB']) ? $_POST['tahunPBB'] : '-';
    $cbNoHp = isset($_POST['cbNoHP']) ? 'Tersedia' : '-';
    $noHp = isset($_POST['noHP']) ? $_POST['noHP'] : '-';
    $cbDokLainnya = isset($_POST['cbDokLainnya']) ? 'Tersedia' : '-';
    $dokLainnya = isset($_POST['dokLainnya']) ? $_POST['dokLainnya'] : '-';
    $kamarTidur = isset($_POST['kamarTidur']) ? $_POST['kamarTidur'] : '-';
    $kamarMandi = isset($_POST['kamarMandi']) ? $_POST['kamarMandi'] : '-';
    $garasi = isset($_POST['carport']) ? $_POST['carport'] : '-';
    $cbCarport = isset($_POST['cbCarport']) ? 'Tersedia' : '-';
    $cbKamarMandi = isset($_POST['cbKamarMandi']) ? 'Tersedia' : '-';
    $cbKamarTidur = isset($_POST['cbKamarTidur']) ? 'Tersedia' : '-';
    $cbRuangTamu = isset($_POST['cbRuangTamu']) ? 'Tersedia' : '-';
    $cbRuangKeluarga = isset($_POST['cbRuangKeluarga']) ? 'Tersedia' : '-';
    $cbRuangKerja = isset($_POST['cbRuangKerja']) ? 'Tersedia' : '-';
    $cbKolamRenang = isset($_POST['cbKolamRenang']) ? 'Tersedia' : '-';
    $cbTaman = isset($_POST['cbTaman']) ? 'Tersedia' : '-';
    $cbTeras = isset($_POST['cbTeras']) ? 'Tersedia' : '-';
    $cbGudang = isset($_POST['cbGudang']) ? 'Tersedia' : '-';
    $cbDapur = isset($_POST['cbDapur']) ? 'Tersedia' : '-';
    $cbKTpembantu = isset($_POST['cbKamarTidurART']) ? 'Tersedia' : '-';
    $cbKMpembantu = isset($_POST['cbKamarMandiART']) ? 'Tersedia' : '-';
    $cbFasListrik = isset($_POST['cbFasListrik']) ? 'Tersedia' : '-';
    $fasListrik = isset($_POST['fasListrik']) ? $_POST['fasListrik'] : '-';
    $cbFasTelpon = isset($_POST['cbFasTelpon']) ? 'Tersedia' : '-';
    $fasTelpon = isset($_POST['fasTelpon']) ? $_POST['fasTelpon'] : '-';
    $cbFasAC = isset($_POST['cbFasAC']) ? 'Tersedia' : '-';
    $fasAC = isset($_POST['fasAC']) ? $_POST['fasAC'] : '-';
    $cbFurnished = isset($_POST['cbFasFurnished']) ? 'Furnished' : '-';
    $cbUnfurnished = isset($_POST['cbFasUnfurnished']) ? 'Unfurnished' : '-';
    $cbSemiFurnished = isset($_POST['cbFasSemiFurnished']) ? 'Semi-Furnished' : '-';
    $cbFasAirPAM = isset($_POST['cbFasAirPAM']) ? 'Tersedia' : '-';
    $cbFasAirTanah = isset($_POST['cbFasAirTanah']) ? 'Tersedia' : '-';
    $cbFasWaterHeater = isset($_POST['cbFasWaterHeater']) ? 'Tersedia' : '-';
    $fasKeterangan = isset($_POST['keteranganFasLainnya']) ? $_POST['keteranganFasLainnya'] : '-';
    $namaPemilik = isset($_POST['namaPemilik']) ? $_POST['namaPemilik'] : '-';
    $noKTPpemilik = isset($_POST['noKTPpemilik']) ? $_POST['noKTPpemilik'] : '-';
    $noHpPemilik = isset($_POST['noHpPemilik']) ? $_POST['noHpPemilik'] : '-';
    $noTelRmhPemilik = isset($_POST['telpRmhPemilik']) ? $_POST['telpRmhPemilik'] : '-';
    $emailPemilik = isset($_POST['emailPemilik']) ? $_POST['emailPemilik'] : '-';
    $alamatPemilik = isset($_POST['alamatPemilik']) ? $_POST['alamatPemilik'] : '-';
    $namaAgent = isset($_POST['namaAgentLJH']) ? $_POST['namaAgentLJH'] : '-';
    $kantorAgent = isset($_POST['kantorLJH']) ? $_POST['kantorLJH'] : '-';
    $noHpAgent = isset($_POST['noHpAgent']) ? $_POST['noHpAgent'] : '-';
    $telpKantor = isset($_POST['telpKantor']) ? $_POST['telpKantor'] : '-';
    $emailAgent = isset($_POST['emailAgent']) ? $_POST['emailAgent'] : '-';
    $alamatAgent = isset($_POST['alamatAgent']) ? $_POST['alamatAgent'] : '-';

    // Add more fields as needed
    $sql = "INSERT INTO onlinelisting (nama_marketing, tahun_ppp, no_ppp, kategoriListing, jenisTransaksi, jenisListing, besaranKomisi, jangkaWaktu, sampaiDengan, jenisProperti, luasTanah, luasBangunan, area, blok, hadapView, jumlahLantai, alamatListingProperti, hargaJual, minLamaSewa, deposit, hargaSewa, cbSHM, noSHM, cbHGB, noHGB, tahunHGB, noIMB, cbIMB, noPBB, cbPBB, tahunPBB, cbNoHp, noHP, cbDokLainnya, dokLainnya, kamarTidur, kamarMandi, cbCarport, carport, cbKamarMandi, cbKamarTidur, cbRuangTamu, cbRuangKeluarga, cbKolamRenang, lokasiTanah, cbTaman, cbTeras, cbGudang, cbRuangKerja, cbDapur, kt_pembantu, km_pembantu, cbListrik, wattListrik, cbTelepon, lineTelepon, cbAC, unitAC, cbFurnished, cbUnfurnished, cbSemiFurnished, cbAirPAM, cbAirTanah, cbWaterHeater, fasKeterangan, namaPemilik, noKTPPemilik, noHPPemilik, noTelpRumahPemilik, emailPemilik, alamatPemilik, namaAgent, kantorAgent, noHPAgent, telpKantor, emailAgent, alamatAgent)
            VALUES ('$nama_marketing', '$tahun_ppp', '$no_ppp', '$kategoriListing', '$jenisTransaksi', '$jenisListing', '$besaranKomisi', '$jangkaWaktu', '$jangkaWaktu2', '$jenisProperti', '$luasTanah', '$luasBangunan', '$area', '$blok', '$hadapView', '$jumlahLantai', '$alamatListingProperti', '$hargaJual', '$minLamaSewa', '$deposit', '$hargaSewa', '$cbSHM', '$noSHM', '$cbHGB', '$noHGB', '$tahunHGB', '$noIMB', '$cbIMB', '$noPBB', '$cbPBB', '$tahunPBB', '$cbNoHp', '$noHp', '$cbDokLainnya', '$dokLainnya', '$kamarTidur', '$kamarMandi', '$lokasiTanah', '$cbCarport', '$garasi', '$cbKamarMandi', '$cbKamarTidur', '$cbRuangTamu', '$cbRuangKeluarga', '$cbKolamRenang', '$cbTaman', '$cbTeras', '$cbGudang', '$cbRuangKerja', '$cbDapur', '$cbKTpembantu', '$cbKMpembantu', '$cbFasListrik', '$fasListrik', '$cbFasTelpon', '$fasTelpon', '$cbFasAC', '$fasAC', '$cbFurnished', '$cbUnfurnished', '$cbSemiFurnished', '$cbFasAirPAM', '$cbFasAirTanah', '$cbFasWaterHeater', '$fasKeterangan', '$namaPemilik', '$noKTPpemilik', '$noHpPemilik', '$noTelRmhPemilik', '$emailPemilik', '$alamatPemilik', '$namaAgent', '$kantorAgent', '$noHpAgent', '$telpKantor', '$emailAgent', '$alamatAgent')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Set success message in session
        $_SESSION['success_message'] = 'Data berhasil ditambahkan.';
        header('Location: viewDataListing.php');
        exit();
    } else {
        // Set error message in session
        $_SESSION['error_message'] = 'Data tidak berhasil ditambahkan: ' . mysqli_error($conn);
        header('Location: index.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Add a meaningful description here">
        <meta name="author" content="Mr. Sopyan">

        <title>LJHOOKER ICON BSD - Your Meaningful Title</title>

        <!-- Custom fonts for this template-->
        <!-- <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="../css/sb-admin-2.min.css" rel="stylesheet">
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
                            <img src="../img/logo_LJH_Icon_BSD_2-removebg.png" alt="logo" width="150" height="40">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="viewDataListing.php">Data Listing</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">Create Listing</a>
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
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">PERJANJIAN PEMASARAN PROPERTI</h6>
                                </div>

                                <div class="card-body">
                                    <form action="" method="post" id="formID">
                                        <div class="row">
                                            <div class="col-lg">
                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3">
                                                        <h6 class="m-0 font-weight-bold text-primary">Data Listing</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <label for="no_ppp">No. PPP : LJHBSD/PPP/</label>
                                                                    <select class="form-control col-sm" id="tahun_ppp" name="tahun_ppp"></select>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label>&nbsp;</label>
                                                                    <div>
                                                                        <?php
                                                                        require '../controller/funtions.php';
                                                                        // Mengambil ID terakhir dari database
                                                                        $id_to_fetch_query = "SELECT MAX(no_ppp) FROM onlinelisting";
                                                                        $result = mysqli_query($conn, $id_to_fetch_query);

                                                                        if ($result) {
                                                                            $row = mysqli_fetch_array($result);
                                                                            $id_to_fetch = $row[0]; // Mengambil nilai ID terakhir dari hasil query
                                                                        } else {
                                                                            // Handle error jika query tidak berhasil
                                                                            echo "Error: " . mysqli_error($conn);
                                                                            // Atau berikan nilai default jika tidak dapat mengambil ID terakhir
                                                                            $id_to_fetch = 1;
                                                                        }

                                                                        $no_ppp_value = getNoPPPValue($id_to_fetch);

                                                                        // Tambahkan 1 pada nilai yang diambil
                                                                        $display_value = $no_ppp_value + 1;
                                                                        ?>
                                                                        <input type="text" class="form-control form-control-user col-lg" id="no_ppp" name="no_ppp" value="<?php echo $display_value; ?>" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group"><br>
                                                                <label for="namaMarketing">Nama Marketing</label>
                                                                <input type="text" class="form-control form-control-user" name="namaMarketing" aria-describedby="namaMarketingHelp" value="<?php echo $_SESSION['username']; ?>" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3">
                                                        <h6 class="m-0 font-weight-bold text-primary">Kategori Properti</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="kategoriListing">Kategori Properti / Listing</label>
                                                            <select class="form-control" id="kategoriListing" name="kategoriListing">
                                                                <option value="Primary">Primary</option>
                                                                <option value="Secondary">Secondary</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="jenisListing">Jenis Listing</label>
                                                            <select class="form-control" id="jenisListing" name="jenisListing">
                                                                <option value="Open">Open</option>
                                                                <option value="Exclusive">Exclusive</option>
                                                                <option value="Sole Agent">Sole Agent</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <label for="jangkaWaktu">Jangka Waktu</label>
                                                                    <input type="text" class="form-control form-control-user" id="jangkaWaktu" name="jangkaWaktu">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label for="jangkaWaktu2">Sampai Dengan</label>
                                                                    <input type="text" class="form-control form-control-user" id="jangkaWaktu2" name="jangkaWaktu2">
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <label for="jenisTransaksi">Jenis Transaksi</label>
                                                                    <select class="form-control" id="jenisTransaksi" name="jenisTransaksi">
                                                                        <option value="Jual">Jual</option>
                                                                        <option value="Sewa">Sewa</option>
                                                                        <option value="Jual / Sewa">Jual / Sewa</option>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group col-lg-6">
                                                                    <label for="besaranKomisi">Besaran Komisi (%)</label>
                                                                    <input type="text" class="form-control form-control-user" id="besaranKomisi" name="besaranKomisi">
                                                                </div>

                                                                <div class="form-group col-lg-6">
                                                                    <label for="jenisProperti">Jenis Properti</label>
                                                                    <select class="form-control" id="jenisProperti" name="jenisProperti" onchange="toggleInput()">
                                                                        <option value="Ruko">Ruko</option>
                                                                        <option value="Rumah">Rumah</option>
                                                                        <option value="Toko">Toko / Kios</option>
                                                                        <option value="Mall">Mall</option>
                                                                        <option value="Villa">Villa</option>
                                                                        <option value="Kavling">Kavling</option>
                                                                        <option value="Gedung">Gedung</option>
                                                                        <option value="Condotel">Condotel</option>
                                                                        <option value="Apartemen">Apartemen</option>
                                                                        <option value="Tanah">Tanah</option>
                                                                        <option value="Gudang">Gudang</option>
                                                                        <option value="Kantor">Kantor</option>
                                                                        <option value="Kost">Kost</option>
                                                                        <option value="Pabrik">Pabrik</option>
                                                                        <option value="Hotel">Hotel</option>
                                                                        <option value="Kontrakan">Kontrakan</option>
                                                                        <option value="Properti Lainnya">Lainnya</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label for="jpLainnya">Lainnya</label>
                                                                    <input type="text" class="form-control form-control-user" id="jpLainnya" name="jpLainnya">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3">
                                                        <h6 class="m-0 font-weight-bold text-primary">Informasi Jual / Sewa
                                                        </h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="hargaJual">Harga Jual</label>
                                                            <input type="text" class="form-control form-control-user" id="hargaJual" name="hargaJual">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="minimalLamaSewa">Minimal Lama Sewa</label>
                                                            <input type="text" class="form-control form-control-user" id="minimalLamaSewa" name="minimalLamaSewa">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="deposit">Deposit</label>
                                                            <input type="text" class="form-control form-control-user" id="deposit" name="deposit">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="hargaSewa">Harga Sewa</label>
                                                            <input type="text" class="form-control form-control-user" id="hargaSewa" name="hargaSewa">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                        </div>



                                        <div class="row">

                                            <div class="col-lg">
                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3">
                                                        <h6 class="m-0 font-weight-bold text-primary">Data Properti</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="luasTanah">Luas Tanah /m2</label>
                                                                    <input type="text" class="form-control form-control-user" id="luasTanah" name="luasTanah">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="lokasiTanah">Lokasi Tanah </label>
                                                                    <input type="text" class="form-control form-control-user" id="lokasiTanah" name="lokasiTanah" placeholder="hook/badan">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="jumlahLantai">Lantai </label>
                                                                    <input type="text" class="form-control form-control-user" id="jumlahLantai" name="jumlahLantai">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="area">Area </label>
                                                                    <input type="text" class="form-control form-control-user" id="area" name="area">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="blok">Blok </label>
                                                                    <input type="text" class="form-control form-control-user" id="blok" name="blok">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="luasBangunan">Luas Bangunan /m2</label>
                                                                    <input type="text" class="form-control form-control-user" id="luasBangunan" name="luasBangunan">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="hadapView">Hadap / View</label>
                                                                    <input type="text" class="form-control form-control-user" id="hadapView" name="hadapView">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="alamatListingProperti">Alamat Listing (properti)</label>
                                                                    <input type="text" class="form-control form-control-user" id="alamatListingProperti" name="alamatListingProperti">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3">
                                                        <h6 class="m-0 font-weight-bold text-primary">Keterangan Ruangan
                                                        </h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="cbKamarTidur" name="cbKamarTidur">
                                                                    <label class="form-check-label" for="cbKamarTidur">
                                                                        Kamar Tidur
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-sm-6">
                                                                <input type="text" name="kamarTidur" id="kamarTidur" class="form-control form-control-user" placeholder="ada berapa kamar tidur ?">
                                                            </div>

                                                            <div class="form-group col-sm-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="cbKamarMandi" name="cbKamarMandi">
                                                                    <label class="form-check-label" for="cbKamarMandi">
                                                                        Kamar Mandi
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-sm-6">
                                                                <input type="text" name="kamarMandi" id="kamarMandi" class="form-control form-control-user" placeholder="ada berapa kamar mandi ?">
                                                            </div>

                                                            <div class="form-group col-sm-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="cbCarport" name="cbCarport">
                                                                    <label class="form-check-label" for="cbCarport">
                                                                        Garasi / Carport
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-sm-6">
                                                                <input type="text" name="carport" id="carport" class="form-control form-control-user">
                                                            </div>

                                                            <div class="form-group col-sm-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="cbRuangTamu" name="cbRuangTamu">
                                                                    <label class="form-check-label" for="cbRuangTamu">
                                                                        Ruang Tamu
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-sm-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="cbRuangKeluarga" name="cbRuangKeluarga">
                                                                    <label class="form-check-label" for="cbRuangKeluarga">
                                                                        Ruang Keluarga
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-sm-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="cbRuangKerja" name="cbRuangKerja">
                                                                    <label class="form-check-label" for="cbRuangKerja">
                                                                        Ruang kerja
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-sm-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="cbKolamRenang" name="cbKolamRenang">
                                                                    <label class="form-check-label" for="cbKolamRenang">
                                                                        Kolam Renang
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-sm-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="cbTaman" name="cbTaman">
                                                                    <label class="form-check-label" for="cbTaman">
                                                                        Taman
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-sm-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="cbTeras" name="cbTeras">
                                                                    <label class="form-check-label" for="cbTeras">
                                                                        Teras
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-sm-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="cbGudang" name="cbGudang">
                                                                    <label class="form-check-label" for="cbGudang">
                                                                        Gudang
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-sm-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="cbDapur" name="cbDapur">
                                                                    <label class="form-check-label" for="cbDapur">
                                                                        Dapur
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-sm-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="cbKamarTidurART" name="cbKamarTidurART">
                                                                    <label class="form-check-label" for="cbKamarTidurART">
                                                                        Kamar Tidur ART
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-sm-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="cbKamarMandiART" name="cbKamarMandiART">
                                                                    <label class="form-check-label" for="cbKamarMandiART">
                                                                        Kamar Mandi ART
                                                                    </label>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3">
                                                        <h6 class="m-0 font-weight-bold text-primary">Dokumen
                                                            Kepemilikan
                                                        </h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="cbSHM" name="cbSHM">
                                                                    <label class="form-check-label" for="cbSHM">
                                                                        No. SHM
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-sm-6">
                                                                <input type="text" name="noSHM" id="noSHM" class="form-control form-control-user">
                                                            </div>

                                                            <div class="form-group col-sm-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="cbHGB" name="cbHGB">
                                                                    <label class="form-check-label" for="cbHGB">
                                                                        No. HGB
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-sm-3">
                                                                <input type="text" name="noHGB" id="noHGB" class="form-control form-control-user">
                                                            </div>
                                                            <div class="form-group col-sm-3">
                                                                <input type="text" name="tahunHGB" id="tahunHGB" class="form-control form-control-user" placeholder="tahun">
                                                            </div>

                                                            <div class="form-group col-sm-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="cbNoHP" name="cbNoHP">
                                                                    <label class="form-check-label" for="cbNoHP">
                                                                        No. HP
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-sm-6">
                                                                <input type="text" name="noHP" id="noHP" class="form-control form-control-user">
                                                            </div>

                                                            <div class="form-group col-sm-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="cbPBB" name="cbPBB">
                                                                    <label class="form-check-label" for="cbPBB">
                                                                        No. PBB
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-sm-3">
                                                                <input type="text" name="noPBB" id="noPBB" class="form-control form-control-user">
                                                            </div>
                                                            <div class="form-group col-sm-3">
                                                                <input type="text" name="tahunPBB" id="tahunPBB" class="form-control form-control-user" placeholder="tahun">
                                                            </div>

                                                            <div class="form-group col-sm-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="cbIMB" name="cbIMB">
                                                                    <label class="form-check-label" for="cbIMB">
                                                                        No. IMB
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-sm-6">
                                                                <input type="text" name="noIMB" id="noIMB" class="form-control form-control-user">
                                                            </div>

                                                            <div class="form-group col-sm-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="cbDokLainnya" name="cbDokLainnya">
                                                                    <label class="form-check-label" for="cbDokLainnya">
                                                                        Lainnya
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-sm-6">
                                                                <input type="text" name="dokLainnya" id="dokLainnya" class="form-control form-control-user">
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg">
                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3">
                                                        <h6 class="m-0 font-weight-bold text-primary">Fasilitas</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="cbFasListrik" name="cbFasListrik">
                                                                    <label class="form-check-label" for="cbFasListrik">
                                                                        Listrik
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-sm-6">
                                                                <input type="text" name="fasListrik" id="fasListrik" class="form-control form-control-user" placeholder="Watt">
                                                            </div>

                                                            <div class="form-group col-sm-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="cbFasTelpon" name="cbFasTelpon">
                                                                    <label class="form-check-label" for="cbFasTelpon">
                                                                        Telepon
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-sm-6">
                                                                <input type="text" name="fasTelpon" id="fasTelpon" class="form-control form-control-user" placeholder="Line">
                                                            </div>

                                                            <div class="form-group col-sm-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="cbFasAC" name="cbFasAC">
                                                                    <label class="form-check-label" for="cbFasAC">
                                                                        AC
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-sm-6">
                                                                <input type="text" name="fasAC" id="fasAC" class="form-control form-control-user" placeholder="Unit">
                                                            </div>

                                                            <div class="form-group col-sm-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="cbFasFurnished" name="cbFasFurnished">
                                                                    <label class="form-check-label" for="cbFasFurnished">
                                                                        Furnished
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-sm-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="cbFasUnfurnished" name="cbFasUnfurnished">
                                                                    <label class="form-check-label" for="cbFasUnfurnished">
                                                                        Unfurnished
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-sm-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="cbFasSemiFurnished" name="cbFasSemiFurnished">
                                                                    <label class="form-check-label" for="cbFasSemiFurnished">
                                                                        Semi-Furnished
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-sm-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="cbFasAirPAM" name="cbFasAirPAM">
                                                                    <label class="form-check-label" for="cbFasAirPAM">
                                                                        Air PAM
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-sm-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="cbFasAirTanah" name="cbFasAirTanah">
                                                                    <label class="form-check-label" for="cbFasAirTanah">
                                                                        Air Tanah
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-sm-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="cbFasWaterHeater" name="cbFasWaterHeater">
                                                                    <label class="form-check-label" for="cbFasWaterHeater">
                                                                        Water Heater
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleTextarea">Keterangan Lainnya</label>
                                                                <textarea class="form-control" name="keteranganFasLainnya" id="exampleTextarea" rows="9" style="resize: none; width:85vh"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">

                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3">
                                                        <h6 class="m-0 font-weight-bold text-primary">Pihak Pemilik Properti (Pihak 1) </h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="namaPemilik">Nama</label>
                                                            <input type="text" class="form-control form-control-user" id="namaPemilik" name="namaPemilik">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="noKTPpemilik">No. KTP</label>
                                                            <input type="text" class="form-control form-control-user" id="noKTPpemilik" name="noKTPpemilik">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="noHpPemilik">HP</label>
                                                            <input type="text" class="form-control form-control-user" id="noHpPemilik" name="noHpPemilik">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="telpRmhPemilik">Telp Rumah / Kantor</label>
                                                            <input type="text" class="form-control form-control-user" id="telpRmhPemilik" name="telpRmhPemilik">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="emailPemilik">Email</label>
                                                            <input type="text" class="form-control form-control-user" id="emailPemilik" name="emailPemilik">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="alamatPemilik">Alamat</label>
                                                            <textarea class="form-control" id="alamatPemilik" name="alamatPemilik" rows="4" style="resize: none;"></textarea>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <?php
                                                include '../config/Connections.php';
                                                if (isset($_SESSION['username'])) {
                                                    $username = $_SESSION['username'];
                                                    $sql = "SELECT * FROM users WHERE username = '$username'";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        $row = $result->fetch_assoc();
                                                    } else {
                                                        echo "User not Found";
                                                    }
                                                }
                                                ?>
                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3">
                                                        <h6 class="m-0 font-weight-bold text-primary">Pihak Agent LJ Hooker (Pihak 2)</h6>
                                                    </div>

                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="namaAgentLJH">Nama</label>
                                                            <input type="text" class="form-control form-control-user" id="namaAgentLJH" name="namaAgentLJH" value="<?= $row['username'] ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="kantorLJH">Kantor</label>
                                                            <input type="text" class="form-control form-control-user" id="kantorLJH" name="kantorLJH" value="<?= $row['kantor'] ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="noHpAgent">HP</label>
                                                            <input type="text" class="form-control form-control-user" id="noHpAgent" name="noHpAgent" value="<?= $row['hp'] ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="telpKantor">Telp Kantor</label>
                                                            <input type="text" class="form-control form-control-user" id="telpKantor" name="telpKantor" value="(021)40 000 916 ">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="emailAgent">Email</label>
                                                            <input type="text" class="form-control form-control-user" id="emailAgent" name="emailAgent" value="<?= $row['email'] ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="alamatAgent">Alamat</label>
                                                            <textarea class="form-control" id="alamatAgent" name="alamatAgent" rows="4" style="resize: none;"><?= $row['alamat'] ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                            <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="width: 100%;">
                                                Create Property Marketing Agreement
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Of Begin Page Content -->
            </div>
            <!-- End Of Main Content -->
        </div>
        <!-- End Of Content Wrapper -->
    </div>

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
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>



    <!-- JavaScript -->
    <script>
        // Ambil elemen select dengan ID "tahun_ppp"
        var tahunSelect = document.getElementById("tahun_ppp");
        // Mendapatkan tahun saat ini
        var tahunSekarang = new Date().getFullYear();
        // Isi elemen select dengan opsi-opsi tahun
        for (var tahun = tahunSekarang; tahun >= tahunSekarang - 10; tahun--) {
            var option = document.createElement("option");
            option.value = tahun;
            option.text = tahun;
            tahunSelect.add(option);
        }
    </script>

    <script src="../js/ppp.js"></script>
    <script src="../js/calender.js"></script>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../js/sb-admin-2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Page level plugins -->
    <!-- <script src="../vendor/chart.js/Chart.min.js"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="../js/demo/chart-area-demo.js"></script> -->
    <!-- <script src="../js/demo/chart-pie-demo.js"></script> -->
</body>

</html>