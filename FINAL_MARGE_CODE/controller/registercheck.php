<?php
include('../model/usermodel.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $contact_no = $_POST['contact_no'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (checkIfUsernameExists($username)) {
        echo "Username already exists!";
    } else {
        if (addUser($name, $contact_no, $password, $username)) {
            // Redirect to login page after successful registration
            header('Location: ../view/login.html');
            exit();
        } else {
            echo "Error in registration.";
        }
    }
}
?>
