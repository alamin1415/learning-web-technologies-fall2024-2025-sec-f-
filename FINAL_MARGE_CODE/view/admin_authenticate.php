<?php
session_start();
require_once './includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM admin WHERE username = ?");
    $stmt->execute([$username]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin && $password === $admin['password']) { // Hash password in production!
        $_SESSION['admin_logged_in'] = true;
        header("Location: ./admin/dashboard.php");
        exit;
    } else {
        $_SESSION['error_message'] = "Invalid username or password.";
        header("Location: ./admin/login.php");
        exit;
    }
}
?>
