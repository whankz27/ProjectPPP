<?php
// Sesuaikan dengan informasi database Anda
include '../../config/Connections.php';

// Periksa apakah parameter id ada dalam URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Persiapkan statement SQL untuk menghapus data
    $sql = "DELETE FROM onlinelisting WHERE no_ppp = $id";

    // Eksekusi statement SQL
    if ($conn->query($sql) === TRUE) {
        $_SESSION['success_message'] = "Data berhasil dihapus.";
        echo "<script>
                alert('Data berhasil dihapus.');
                window.location.href = '../viewDataListing.php';
              </script>";
        exit();
    } else {
        $_SESSION['error_message'] = 'Data tidak berhasil dihapus: ' . mysqli_error($conn);
        echo "<script>
                alert('Data tidak berhasil dihapus: " . mysqli_error($conn) . "');
                window.location.href = '../viewDataListing.php';
              </script>";
        exit();
    }
} else {
    $_SESSION['error_message'] = 'Parameter id tidak valid: ' . mysqli_error($conn);
    echo "<script>
            alert('Parameter id tidak valid: " . mysqli_error($conn) . "');
            window.location.href = '../viewDataListing.php';
          </script>";
    exit();
}

// Tutup koneksi
$conn->close();
