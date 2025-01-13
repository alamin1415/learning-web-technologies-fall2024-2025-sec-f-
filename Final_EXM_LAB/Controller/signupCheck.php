<?php
require_once('../Model/empModel.php'); // Updated to hotelModel.php for hotel management system

if (isset($_POST['submit'])) {
    $empname = trim($_REQUEST['name']);
    $contact_no = trim($_REQUEST['contact_no']);
    $username = trim($_REQUEST['username']);
    $password = trim($_REQUEST['password']);
     
     

    // Check for null or empty fields
    if ($empname == null || empty($contact_no) || empty($username) || empty($password)) {
        echo "Null data found!";
    } else {
        // Call addUser function to add the user to the system
        $status = addEmployee($empname, $contact_no, $username, $password );
        if ($status) {
            header('location: ../view/login.html'); // Redirect to login page on success
        } else {
            header('location: ../view/signup.html'); // Redirect to signup page on failure
        }
    }
} else {
    header('location: ../view/signup.html'); // Redirect if form is not submitted
}
?>
