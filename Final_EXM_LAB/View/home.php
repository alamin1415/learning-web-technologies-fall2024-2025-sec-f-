<?php
session_start();
require_once('../Model/empModel.php'); 

if (isset($_COOKIE['flag'])) {
    if (isset($_POST['addEmployee'])) {
        $empname = $_POST['empname'];
        $contact_no = $_POST['contact_no'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        addEmployee($empname, $contact_no, $username, $password);
    }

    if (isset($_GET['deleteId'])) {
        $deleteId = $_GET['deleteId'];
        deleteEmployee($deleteId);
    }

    $query = "SELECT * FROM employees";

    if (isset($_GET['query'])) {
        $searchQuery = $_GET['query'];
        $query = "SELECT * FROM employees WHERE empname LIKE '%$searchQuery%' OR username LIKE '%$searchQuery%'";
    }

    $employees = getAllEmployee($query);
?>

<html lang="en">
<head>
    <title>Employee Management</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .action-btn {
            color: #007bff;
            text-decoration: none;
        }

        .action-btn:hover {
            text-decoration: underline;
        }

        #searchContainer {
            margin-bottom: 20px;
        }

        #employeeResults {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <h1>Welcome to Online Shop Management System, <?php echo $_SESSION['username']; ?>!</h1>

    <div id="searchContainer">
        <input type="text" id="search" placeholder="Search for employees..." onkeyup="searchEmployee()" />
    </div>

    <div>
        <a href="addEmployee.php" class="add-btn">Add User</a>
    </div>

    <div id="employeeResults">
        <h2>Employee List</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Contact No</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>

            <tbody id="employeeTableBody">
                <?php
                    if (count($employees) > 0) {
                        foreach ($employees as $employee) {
                            echo "<tr>";
                            echo "<td>" . $employee['id'] . "</td>";
                            echo "<td>" . $employee['empname'] . "</td>";
                            echo "<td>" . $employee['contact_no'] . "</td>";
                            echo "<td>" . $employee['username'] . "</td>";
                            echo "<td>";
                            echo "<a href='updateEmployee.php?id=" . $employee['id'] . "' class='action-btn update-btn'>Update</a> ";
                            echo "<a href='?deleteId=" . $employee['id'] . "' class='action-btn'>Delete</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No results found</td></tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function searchEmployee() {
            var searchQuery = document.getElementById('search').value;
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'searchlist.php?query=' + searchQuery, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById('employeeTableBody').innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }
    </script>

</body>
</html>

<?php
} else {
    header('location: login.html');
}
?>
