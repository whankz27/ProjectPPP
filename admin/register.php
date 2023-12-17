<?php
session_start();
require '../config/Connections.php';

$errorMessage = '';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashPassword = password_hash($password, PASSWORD_DEFAULT);
    $level = 'user';
    $kantor = $_POST['kantor'];
    $hp = $_POST['hp'];
    $alamat = $_POST['alamat'];

    // SQL Injection Prevention using Prepared Statement
    $query = "INSERT INTO users (username, email, password, level, kantor, hp, alamat) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    // Bind parameter ke statement
    mysqli_stmt_bind_param($stmt, "sssssss", $username, $email, $hashPassword, $level, $kantor, $hp, $alamat);

    // Eksekusi statement
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "<script>alert('Registration Successful');</script>";
        header("location: ../login.php");
        exit();
    } else {
        $errorMessage = "Registrasi gagal. Silahkan coba lagi.";
    }

    // Tutup statement
    mysqli_stmt_close($stmt);
}

// Tutup koneksi database
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Registration</title>
    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Register</h1>
                                    </div>
                                    <form class="user" action="register.php" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="password" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="hp" name="hp" placeholder="Nomor HP" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="kantor" name="kantor" placeholder="Kantor" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Alamat" required>
                                        </div>

                                        <?php if (!empty($errorMessage)) : ?>
                                            <p style="color: red;"><?php echo $errorMessage; ?></p>
                                        <?php endif; ?>

                                        <button type="submit" class="tombol_register btn btn-primary btn-user btn-block" name="register">REGISTER</button>
                                    </form>
                                    <br><a href="viewDataListing.php" class="btn btn-secondary btn-user btn-blocks" style="width: 100%;">Back To Dashboard</a>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages -->
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>