<?php
require_once('../model/EmployeeModel.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];

    if ($action === 'add') {
        $empname = $_POST['empname'];
        $contact_no = $_POST['contact_no'];
        $username = $_POST['username'];
        $password = $_POST['password']; // Storing the password as plain text (not recommended for production).

        if (addEmployee($empname, $contact_no, $username, $password)) {
            header("Location: view.php?message=Employee added successfully");
        } else {
            header("Location: view.php?error=Failed to add employee");
        }
    } elseif ($action === 'delete') {
        $id = $_POST['id'];

        if (deleteUser($id)) {
            header("Location: view.php?message=Employee deleted successfully");
        } else {
            header("Location: view.php?error=Failed to delete employee");
        }
    }
}
?>
