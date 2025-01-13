<?php
    session_start();
    require_once('../Model/empModel.php');

    if(isset($_COOKIE['flag'])){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $empname = $_POST['empname'];
            $contact_no = $_POST['contact_no'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            $result = addEmployee($empname, $contact_no, $username, $password);

            if ($result) {
                echo "Employee added successfully!";
                header("Location: home.php");
            } else {
                echo "Error adding employee.";
            }
        }
?>

<html lang="en">
<head>
    <title>Add Employee</title>
</head>
<body>

    <h1>Add New Employee</h1>

    <table border="1" cellpadding="10" cellspacing="0" align="center">
        <form method="POST" action="addEmployee.php">
            <tr>
                <td><label for="empname">Employee Name:</label></td>
                <td><input type="text" name="empname" placeholder="Employee Name" required /></td>
            </tr>
            <tr>
                <td><label for="contact_no">Contact Number:</label></td>
                <td><input type="text" name="contact_no" placeholder="Contact Number" required /></td>
            </tr>
            <tr>
                <td><label for="username">Username:</label></td>
                <td><input type="text" name="username" placeholder="Username" required /></td>
            </tr>
            <tr>
                <td><label for="password">Password:</label></td>
                <td><input type="password" name="password" placeholder="Password" required /></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <button type="submit">Add Employee</button>
                </td>
            </tr>
        </form>
    </table>

</body>
</html>

<?php
    } else {
        header('location: login.html');
    }
?>
