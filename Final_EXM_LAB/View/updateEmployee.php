<?php
session_start();
require_once('../Model/empModel.php');

if (isset($_COOKIE['flag'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $employee = getEmployee($id);
    } else {
        header('Location: home.php'); 
        exit();
    }
?>

<html lang="en">
<head>
    <title>Update Employee</title>
    <script>
        function validateForm() {
            var empname = document.getElementById("empname").value;
            var contact_no = document.getElementById("contact_no").value;
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;

            if (empname == "" || contact_no == "" || username == "" || password == "") {
                alert("All fields must be filled out.");
                return false;
            }
            return true;
        }
    </script>
    <style>
    </style>
</head>
<body>

    <h1>Update Employee</h1>

    <form method="POST" onsubmit="return validateForm()">
        <label for="empname">Name:</label>
        <input type="text" id="empname" name="empname" value="<?php echo $employee['empname']; ?>"><br><br>

        <label for="contact_no">Contact No:</label>
        <input type="text" id="contact_no" name="contact_no" value="<?php echo $employee['contact_no']; ?>"><br><br>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $employee['username']; ?>"><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="<?php echo $employee['password']; ?>"><br><br>

        <button type="submit">Update Employee</button>
    </form>

</body>
</html>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $empname = $_POST['empname'];
        $contact_no = $_POST['contact_no'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $con = getConnection();
        $sql = "UPDATE employees SET 
                empname = '{$empname}', 
                contact_no = '{$contact_no}', 
                username = '{$username}', 
                password = '{$password}' 
                WHERE id = {$id}";
        
        if (mysqli_query($con, $sql)) {
            header('Location: home.php'); 
            exit();
        } else {
            $errorMessage = "Failed to update employee.";
        }
    }
} else {
    header('location: login.html'); 
}
?>
