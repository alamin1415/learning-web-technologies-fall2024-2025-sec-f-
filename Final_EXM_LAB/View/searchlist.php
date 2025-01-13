<?php
session_start();
require_once('../Model/empModel.php'); 

if (isset($_COOKIE['flag'])) {
    // Default query to fetch all employees
    $query = "SELECT * FROM employees";

    // Check if there's a search query
    if (isset($_GET['query']) && !empty($_GET['query'])) {
        $searchQuery = $_GET['query'];
        $query = "SELECT * FROM employees WHERE empname LIKE '%$searchQuery%' OR username LIKE '%$searchQuery%'";
    }

    // Perform the query to fetch employees
    $con = getConnection();
    $result = mysqli_query($con, $query);

    // Fetch all employees based on the search query
    $employees = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $employees[] = $row;
        }
    }
?>

<html lang="en">
<head>
    <title>Employee Management - Search Results</title>
    <style>
        /* Add your styles here */
    </style>
</head>
<body>

    <h1>Search Results</h1>

    <div>
        <a href="index.php" class="back-btn">Back to Employee List</a>
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
        </table>
    </div>

</body>
</html>

<?php
} else {
    header('location: login.html');
}
?>
