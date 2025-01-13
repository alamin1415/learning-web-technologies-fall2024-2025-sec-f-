<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Registration</title>
    <script>
        function validateForm() {
            const empname = document.forms["employeeForm"]["empname"].value.trim();
            const contact_no = document.forms["employeeForm"]["contact_no"].value.trim();
            const username = document.forms["employeeForm"]["username"].value.trim();
            const password = document.forms["employeeForm"]["password"].value.trim();

            if (!empname || !contact_no || !username || !password) {
                alert("All fields are required!");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <form name="employeeForm" action="../controller/employeeController.php" method="POST" onsubmit="return validateForm()">
        <label for="empname">Employee Name:</label>
        <input type="text" id="empname" name="empname"><br><br>

        <label for="contact_no">Contact No:</label>
        <input type="text" id="contact_no" name="contact_no"><br><br>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>

        <button type="submit" name="submit">Register</button>
    </form>
</body>
</html>

<?php
require_once('../model/EmployeeModel.php');

if (isset($_POST['submit'])) {
    $empname = trim($_POST['empname']);
    $contact_no = trim($_POST['contact_no']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Check for empty fields (server-side validation for added security)
    if (empty($empname) || empty($contact_no) || empty($username) || empty($password)) {
        echo "All fields are required!";
    } else {
        // Call the model function to save employee data
        $status = addEmployee($empname, $contact_no, $username, $password);

        if ($status) {
            header('location: ../view/homepage.php');
        } else {
            // Redirect back to the registration page
            header('location: ../view/employeeRegistration.html');
        }
    }
} else {
    // Redirect to the registration page if accessed without form submission
    header('location: ../view/employeeRegistration.html');
}
?>
