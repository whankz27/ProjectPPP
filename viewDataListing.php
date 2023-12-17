<?php
session_start();
require 'config/Connections.php';
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
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
                            <img src="img/logo_LJH_Icon_BSD_2-removebg.svg" alt="logo" width="150" height="40">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">Create Listing</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="viewDataListing.php">Data Listing</a>
                                </li>
                                <li class="nav-item">
                                    <div class="topbar-divider d-none d-sm-block"></div>
                                </li>
                                <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="mr-2 d-none d-lg-inline text-gray-700 "><?php echo $_SESSION['username']; ?></span>
                                        <img class="img-profile rounded-circle" src="img/undraw_profile.svg" width="25" height="25">
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
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">View Data Listing</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <?php
                                            // Ambil data dari tabel onlinelisting
                                            $query = "SELECT * FROM onlinelisting";
                                            $result = mysqli_query($conn, $query);

                                            echo "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>";
                                            echo "<thead class='text-center align-middle'>";
                                            echo "<tr>";
                                            echo "<th>Kategori</th>";
                                            echo "<th>Jenis Properti</th>";
                                            echo "<th>Area</th>";
                                            echo "<th>Alamat</th>";
                                            echo "<th>Luas Tanah</th>";
                                            echo "<th>Luas Bangunan</th>";
                                            echo "<th>Harga Jual</th>";
                                            echo "<th>Harga Sewa</th>";
                                            echo "<th>Furnish</th>";
                                            echo "<th>No. PPP</th>";
                                            echo "<th>Nama Marketing</th>";                                        
                                            echo "</tr>";
                                            echo "</thead>";

                                            try {
                                                if($result->num_rows > 0) {
                                                    while($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row['kategoriListing'] . "</td>";
                                                    echo "<td>" . $row['jenisListing'] . "</td>";
                                                    echo "<td>" . $row['area'] . "</td>";
                                                    echo "<td>" . $row['alamatListingProperti'] . "</td>";
                                                    echo "<td>" . $row['luasTanah'] . "</td>";
                                                    echo "<td>" . $row['luasBangunan'] . "</td>";
                                                    echo "<td>" . $row['hargaJual'] . "</td>";
                                                    echo "<td>" . $row['hargaSewa'] . "</td>";
                                                    echo "<td>" . $row['cbFurnished'] . ", " . $row['cbUnfurnished'] . ", " . $row['cbSemiFurnished'] . "</td>";
                                                    echo "<td>" . $row['no_ppp'] . "</td>";
                                                    echo "<td>" . $row['nama_marketing'] . "</td>";
                                                    echo "</tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='13'>0 results</td></tr>";
                                                }
                                                $conn->close();
                                            } catch(Exception $e) {
                                                echo "Error: " . $e->getMessage();
                                            }
                                            echo "</table>";
                                        ?>
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
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>