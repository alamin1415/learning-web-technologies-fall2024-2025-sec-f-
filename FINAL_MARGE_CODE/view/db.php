<?php
// Database connection parameters
$host = '127.0.0.1'; // Use localhost or the specific IP
$dbname = 'hotel_management'; // Database name from the SQL dump
$user = 'root'; // Update with your MySQL username
$password = ''; // Update with your MySQL password

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $password);

    // Set error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Database connection successful!";
} catch (PDOException $e) {
    // Handle connection errors
    die("Database connection failed: " . $e->getMessage());
}
?>

