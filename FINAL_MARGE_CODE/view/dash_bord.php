

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* General Body Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        /* Dashboard Container */
        .dashboard-container {
            width: 80%;
            margin: 20px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        /* Menu Styling */
        .menu {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .menu ul {
            list-style-type: none;
            padding: 0;
        }

        .menu li {
            display: inline-block;
            margin: 10px;
        }

        .menu a {
            text-decoration: none;
            color: #333;
            padding: 12px 20px;
            background-color: #007BFF;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .menu a:hover {
            background-color: #0056b3;
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .dashboard-container {
                width: 90%;
            }

            .menu {
                flex-direction: column;
                align-items: center;
            }

            .menu li {
                margin: 5px 0;
            }

            .menu a {
                padding: 10px 15px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h2>Admin Dashboard</h2>
        <div class="menu">
            <ul>
                <li><a href="admin_manage_users.php">User Control</a></li>
                <li><a href="control_room.php">Room Management</a></li>
                <li><a href="booking.php">Booking Management</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</body>
</html>
