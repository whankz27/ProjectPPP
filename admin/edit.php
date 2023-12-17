<?php
session_start();
// Pastikan pengguna sudah login
require '../config/Connections.php';
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$no_ppp = $_GET['id'];

// Query satu record artikel dari tabel sesuai nilai $articleID
$query = "SELECT * FROM onlinelisting WHERE no_ppp = '$no_ppp'";
$hasil = mysqli_query($conn, $query);
$row = mysqli_fetch_array($hasil);

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

        <title>LJHOOKER ICON BSD</title>

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
                                    <form action="controllers/update.php" method="post" id="formID">
                                        <input type="hidden" name="no_ppp" value="<?= $row['no_ppp']; ?>">
                                        <div class="row">
                                            <div class="col-lg">
                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3">
                                                        <h6 class="m-0 font-weight-bold text-primary">Data Listing</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-lg">
                                                                    <label for="no_ppp">No. PPP : LJHBSD/PPP/</label>
                                                                    <select class="form-control col-sm" id="tahun_ppp" name="tahun_ppp"><?= $row['tahun_ppp']; ?></select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group"><br>
                                                                <label for="nama_marketing">Nama Marketing</label>
                                                                <input type="text" class="form-control form-control-user" name="nama_marketing" value="<?php echo $_SESSION['username']; ?>">
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
                                                        <h6 class="m-0 font-weight-bold text-primary">Data Properti</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="luasTanah">Luas Tanah /m2</label>
                                                            <input type="text" class="form-control form-control-user" id="luasTanah" name="luasTanah" value="<?= $row['luasTanah'] ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="lokasiTanah">Lokasi Tanah </label>
                                                            <input type="text" class="form-control form-control-user" id="lokasiTanah" name="lokasiTanah" placeholder="hook/badan" value="<?= $row['lokasiTanah'] ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="jumlahLantai">Lantai </label>
                                                            <input type="text" class="form-control form-control-user" id="jumlahLantai" name="jumlahLantai" value="<?= $row['jumlahLantai'] ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="area">Area </label>
                                                            <input type="text" class="form-control form-control-user" id="area" name="area" value="<?= $row['area'] ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="blok">Blok </label>
                                                            <input type="text" class="form-control form-control-user" id="blok" name="blok" value="<?= $row['blok'] ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="luasBangunan">Luas Bangunan /m2</label>
                                                            <input type="text" class="form-control form-control-user" id="luasBangunan" name="luasBangunan" value="<?= $row['luasBangunan'] ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="hadapView">Hadap / View</label>
                                                            <input type="text" class="form-control form-control-user" id="hadapView" name="hadapView" value="<?= $row['hadapView'] ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="alamatListingProperti">Alamat Listing (properti)</label>
                                                            <input type="text" class="form-control form-control-user" id="alamatListingProperti" name="alamatListingProperti" value="<?= $row['alamatListingProperti'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3">
                                                        <h6 class="m-0 font-weight-bold text-primary">Informasi Jual
                                                        </h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="hargaJual">Harga Jual</label>
                                                            <input type="text" class="form-control form-control-user" id="hargaJual" name="hargaJual" value="<?= $row['hargaJual'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3">
                                                        <h6 class="m-0 font-weight-bold text-primary">Informasi Sewa
                                                        </h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="minimalLamaSewa">Minimal Lama Sewa</label>
                                                            <input type="text" class="form-control form-control-user" id="minLamaSewa" name="minLamaSewa" value="<?= $row['minLamaSewa'] ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="deposit">Deposit</label>
                                                            <input type="text" class="form-control form-control-user" id="deposit" name="deposit" value="<?= $row['deposit'] ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="hargaSewa">Harga Sewa</label>
                                                            <input type="text" class="form-control form-control-user" id="hargaSewa" name="hargaSewa" value="<?= $row['hargaSewa'] ?>">
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
                                                            <select class="form-control" id="kategoriListing" name="kategoriListing" value="<?= $row['kategoriListing'] ?>">
                                                                <option value="Primary">Primary</option>
                                                                <option value="Secondary">Secondary</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="jenisListing">Jenis Listing</label>
                                                            <select class="form-control" id="jenisListing" name="jenisListing" value="<?= $row['jenisListing'] ?>">
                                                                <option value="Open">Open</option>
                                                                <option value="Exclusive">Exclusive</option>
                                                                <option value="Sole Agent">Sole Agent</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <label for="jangkaWaktu">Jangka Waktu</label>
                                                                    <input type="text" class="form-control form-control-user" id="jangkaWaktu" name="jangkaWaktu" value="<?= $row['jangkaWaktu'] ?>">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label for="jangkaWaktu2">Sampai Dengan</label>
                                                                    <input type="text" class="form-control form-control-user" id="jangkaWaktu2" name="jangkaWaktu2" value="<?= $row['sampaiDengan'] ?>">
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <label for="jenisTransaksi">Jenis Transaksi</label>
                                                                    <select class="form-control" id="jenisTransaksi" name="jenisTransaksi" value="<?= $row['jenisTransaksi'] ?>">
                                                                        <option value="Jual">Jual</option>
                                                                        <option value="Sewa">Sewa</option>
                                                                        <option value="Jual / Sewa">Jual / Sewa</option>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group col-lg-6">
                                                                    <label for="besaranKomisi">Besaran Komisi (%)</label>
                                                                    <input type="text" class="form-control form-control-user" id="besaranKomisi" name="besaranKomisi" value="<?= $row['besaranKomisi'] ?>">
                                                                </div>

                                                                <div class="form-group col-lg-6">
                                                                    <label for="jenisProperti">Jenis Properti</label>
                                                                    <select class="form-control" id="jenisProperti" name="jenisProperti" onchange="toggleInput()" value="<?= $row['jenisProperti'] ?>">
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
                                                                    <input type="text" class="form-control form-control-user" id="jpLainnya" name="jpLainnya" style="display: none;" value="<?= $row['jpLainnya'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

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
                                                                <input type="text" name="kamarTidur" id="kamarTidur" class="form-control form-control-user" placeholder="ada berapa kamar tidur ?" value="<?= $row['kamarTidur'] ?>">
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
                                                                <input type="text" name="kamarMandi" id="kamarMandi" class="form-control form-control-user" placeholder="ada berapa kamar mandi ?" value="<?= $row['kamarMandi'] ?>">
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
                                                                <input type="text" name="carport" id="carport" class="form-control form-control-user" value="<?= $row['carport'] ?>">
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


                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
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
                                                                <input type="text" name="fasListrik" id="fasListrik" class="form-control form-control-user" placeholder="Watt" value="<?= $row['wattListrik'] ?>">
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
                                                                <input type="text" name="fasTelpon" id="fasTelpon" class="form-control form-control-user" placeholder="Line" value="<?= $row['lineTelepon'] ?>">
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
                                                                <input type="text" name="fasAC" id="fasAC" class="form-control form-control-user" placeholder="Unit" value="<?= $row['unitAC'] ?>">
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

                                                            <div class="form-row">
                                                                <div class="form-group">
                                                                    <label for="exampleTextarea">Keterangan Lainnya</label>
                                                                    <textarea class="form-control" name="keteranganFasLainnya" id="exampleTextarea" rows="9" style="width: 85vh; resize: none;"><?= $row['fasKeterangan'] ?></textarea>
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
                                                                <input type="text" name="noSHM" id="noSHM" class="form-control form-control-user" value="<?= $row['noSHM'] ?>">
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
                                                                <input type="text" name="noHGB" id="noHGB" class="form-control form-control-user" value="<?= $row['noHGB'] ?>">
                                                            </div>
                                                            <div class="form-group col-sm-3">
                                                                <input type="text" name="tahunHGB" id="tahunHGB" class="form-control form-control-user" placeholder="tahun" value="<?= $row['tahunHGB'] ?>">
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
                                                                <input type="text" name="noHP" id="noHP" class="form-control form-control-user" value="<?= $row['noHP'] ?>">
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
                                                                <input type="text" name="noPBB" id="noPBB" class="form-control form-control-user" value="<?= $row['noPBB'] ?>">
                                                            </div>
                                                            <div class="form-group col-sm-3">
                                                                <input type="text" name="tahunPBB" id="tahunPBB" class="form-control form-control-user" placeholder="tahun" value="<?= $row['tahunPBB'] ?>">
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
                                                                <input type="text" name="noIMB" id="noIMB" class="form-control form-control-user" value="<?= $row['noIMB'] ?>">
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
                                                                <input type="text" name="dokLainnya" id="dokLainnya" class="form-control form-control-user" value="<?= $row['dokLainnya'] ?>">
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
                                                        <h6 class="m-0 font-weight-bold text-primary">Pihak Pemilik Properti (Pihak 1)</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="namaPemilik">Nama</label>
                                                            <input type="text" class="form-control form-control-user" id="namaPemilik" name="namaPemilik" value="<?= $row['namaPemilik'] ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="noKTPpemilik">No. KTP</label>
                                                            <input type="text" class="form-control form-control-user" id="noKTPpemilik" name="noKTPpemilik" value="<?= $row['noKTPPemilik'] ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="noHpPemilik">HP</label>
                                                            <input type="text" class="form-control form-control-user" id="noHpPemilik" name="noHpPemilik" value="<?= $row['noHPPemilik'] ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="telpRmhPemilik">Telp Rumah / Kantor</label>
                                                            <input type="text" class="form-control form-control-user" id="telpRmhPemilik" name="telpRmhPemilik" value="<?= $row['noTelpRumahPemilik'] ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="emailPemilik">Email</label>
                                                            <input type="text" class="form-control form-control-user" id="emailPemilik" name="emailPemilik" value="<?= $row['emailPemilik'] ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="alamatPemilik">Alamat</label>
                                                            <textarea class="form-control" id="alamatPemilik" name="alamatPemilik" rows="4" style="resize: none;"><?= $row['alamatPemilik'] ?></textarea>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3">
                                                        <h6 class="m-0 font-weight-bold text-primary">Pihak Agent LJ Hooker (Pihak 2)</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="namaAgentLJH">Nama</label>
                                                            <input type="text" class="form-control form-control-user" id="namaAgentLJH" name="namaAgentLJH" value="<?= $row['namaAgent'] ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="kantorLJH">Kantor</label>
                                                            <input type="text" class="form-control form-control-user" id="kantorLJH" name="kantorLJH" value="<?= $row['kantorAgent'] ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="noHpAgent">HP</label>
                                                            <input type="text" class="form-control form-control-user" id="noHpAgent" name="noHpAgent" value="<?= $row['noHPAgent'] ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="telpKantor">Telp Kantor</label>
                                                            <input type="text" class="form-control form-control-user" id="telpKantor" name="telpKantor" value="(021)40 000 916">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="emailAgent">Email</label>
                                                            <input type="text" class="form-control form-control-user" id="emailAgent" name="emailAgent" value="<?= $row['emailAgent'] ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="alamatAgent">Alamat</label>
                                                            <textarea class="form-control" id="alamatAgent" name="alamatAgent" rows="4" style="resize: none;"><?= $row['alamatAgent'] ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                            <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="width: 100%; height: 40px;">
                                                Update
                                            </button>
                                        </div>

                                    </form>
                                    <div class="d-sm-flex alig-items-center justify-content-between mb-4">
                                        <a href="viewDataListing.php" class="center-text d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm" style="width: 100%; height:40px;">Kembali</a>
                                    </div>
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