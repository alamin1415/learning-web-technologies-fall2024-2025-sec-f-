<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        button {
            padding: 5px 10px;
            margin: 2px;
        }
    </style>
</head>
<body>
    <h1>User Management</h1>

    <!-- Add User Form -->
    <h3>Add New Employee</h3>
    <form action="user_list_show.php" method="POST">
        <input type="hidden" name="action" value="add">
        <label for="empname">Name:</label>
        <input type="text" id="empname" name="empname" required>
        <label for="contact_no">Contact No:</label>
        <input type="text" id="contact_no" name="contact_no" required>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Add Employee</button>
    </form>

    <!-- User List -->
    <h3>All Employees</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Contact No</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
           require_once('../model/EmployeeModel.php');

            $users = getAllUser();

            if (count($users) > 0) {
                foreach ($users as $user) {
                    echo "<tr>
                        <td>{$user['id']}</td>
                        <td>{$user['empname']}</td>
                        <td>{$user['contact_no']}</td>
                        <td>{$user['username']}</td>
                        <td>
                            <form action='user_list_show.php' method='POST' style='display:inline-block;'>
                                <input type='hidden' name='action' value='delete'>
                                <input type='hidden' name='id' value='{$user['id']}'>
                                <button type='submit'>Delete</button>
                            </form>
                            <form action='update_user.php' method='GET' style='display:inline-block;'>
                                <input type='hidden' name='id' value='{$user['id']}'>
                                <button type='submit'>Update</button>
                            </form>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No users found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
