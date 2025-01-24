<?php
include('../model/usermodel.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (login($username, $password)) {
        echo 'success';
    } else {
        echo 'Invalid credentials!';
    }
}
?>
