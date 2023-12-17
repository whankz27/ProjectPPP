<?php

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    // The user is not logged in, so redirect them to the login page
    header('Location: login.php');
    exit;
}

// Check if the user has already registered
if (isset($_SESSION['registered'])) {
    // The user has already registered, so redirect them to the home page
    header('Location: home.php');
    exit;
}

// Check if the user has entered their name and email address
if (!isset($_POST['name']) || !isset($_POST['email'])) {
    // The user has not entered their name and email address, so redirect them back to the registration form
    header('Location: register.php');
    exit;
}

// Check if the user has entered a valid email address
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    // The user has not entered a valid email address, so redirect them back to the registration form
    header('Location: register.php');
    exit;
}

// Check if the user has entered a unique name
$sql = "SELECT * FROM users WHERE name = :name";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':name', $_POST['name']);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    // The user has already registered with this name, so redirect them back to the registration form
    header('Location: register.php');
    exit;
}

// The user has successfully registered, so create a new user account
$sql = "INSERT INTO users (name, email, level, password, confirm_password, kantor, hp, alamat) VALUES (:name, :email, 'user', :password, :confirm_password, :kantor, :hp, :alamat)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':name', $_POST['name']);
$stmt->bindParam(':email', $_POST['email']);
$stmt->bindParam(':password', $_POST['password']);
$stmt->bindParam(':confirm_password', $_POST['confirmPassword']);
$stmt->bindParam(':kantor', $_POST['kantor']);
$stmt->bindParam(':hp', $_POST['hp']);
$stmt->bindParam(':alamat', $_POST['alamat']);
$stmt->execute();

// Set the session variable to indicate that the user has registered
$_SESSION['registered'] = true;

// Redirect the user to the home page
header('Location: home.php');
exit;
