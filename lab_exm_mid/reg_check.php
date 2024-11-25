<?php
session_start(); 

if (!isset($_SESSION['registrations'])) {
    $_SESSION['registrations'] = [];
}

$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';
$confirm_password = isset($_POST['confirm_password']) ? trim($_POST['confirm_password']) : '';

if (!empty($username) && 
    !empty($password) && 
    $password === $confirm_password) {

    $_SESSION['registrations'][] = [
        'username' => $username,
        'password' => $password 
    ];

    echo "Registration successful! <a href='login.html'>Go to Login</a>";
} else {
    echo "<a href='registration.html'>Go Back</a>";
}
?>
