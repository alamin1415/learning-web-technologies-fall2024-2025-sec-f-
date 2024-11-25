<?php
session_start(); 

if (!isset($_SESSION['registrations']) || empty($_SESSION['registrations'])) {
    echo "<h2>No registrations found.</h2>";
    echo "<a href='registration.html'>Go to Registration</a>";
    exit();
}
?>

<html>
<html lang="en">
<head>
    <title>Registered Users</title>
</head>
<body>
            <tr>
                <th>Username</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($_SESSION['registrations'] as $registration) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($registration['username']) . "</td>";
                echo "<td>" . htmlspecialchars($registration['password']) . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <br>
    <a href="registration.html">Add More Registrations</a>
</body>
</html>
