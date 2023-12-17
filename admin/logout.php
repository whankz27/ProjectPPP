<?php
// Start session if not already started
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy session
session_destroy();

// Redirect to login page or appropriate page
header("Location: ../login.php");
exit();
