<?php
session_start();
include '../config/Connections.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare the query using prepared statements
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        if ($data['level'] == "admin") {
            $_SESSION['username'] = $username;
            $_SESSION['level'] = "admin";
            header("location: ../admin/");
            exit();
        } else if ($data['level'] == "user") {
            $_SESSION['username'] = $username;
            $_SESSION['level'] = "user";
            header("location: ../index.php");
            exit();
        } else {
            $errorMessage = "Username and Password do not match!";
        }
    } else {
        $errorMessage = "Username and Password do not match!";
    }

    if (isset($errorMessage)) {
        echo "<div class='alert alert-danger' role='alert'>$errorMessage</div>";
        echo "<script>location.href = '../login.php';</script>";
        exit();
    }
}
?>