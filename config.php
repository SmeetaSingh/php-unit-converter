<?php
session_start();

// Initialize our "Array Database" if not already set
if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [
        ['username' => 'admin', 'password' => 'admin123']
    ];
}

// Function to check if a user is already logged in
function checkLogin() {
    if (!isset($_SESSION['logged_in_user'])) {
        header("Location: login.php");
        exit();
    }
}
?>