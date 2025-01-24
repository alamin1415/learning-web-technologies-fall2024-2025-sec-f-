<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "hotel_management"; 

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update room information
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Collect and sanitize form data
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $room_name = mysqli_real_escape_string($conn, $_POST['room_name']);
    $room_type = mysqli_real_escape_string($conn, $_POST['room_type']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $availability = mysqli_real_escape_string($conn, $_POST['availability']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    
    // Update query
    $sql = "UPDATE room_info SET room_name='$room_name', room_type='$room_type', price='$price', availability='$availability', description='$description' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        $message = "Room updated successfully!";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch room data for editing
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM room_info WHERE id='$id'";
    $result = $conn->query($sql);
    $room = $result->fetch_assoc();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Room Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }

        input[type="text"], input[type="number"], select, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 15px;
            width: 100%;
            cursor: pointer;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .message {
            text-align: center;
            margin-top: 20px;
            color: #4CAF50;
        }

        table {
            width: 100%;
            margin-top: 30px;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        .action-btn {
            color: #4CAF50;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Update Room Information</h2>

        <?php
        // Display success or error message
        if (isset($message)) {
            echo "<div class='message'>$message</div>";
        }
        ?>

        <?php if (isset($room)) { ?>
            <form action="" method="POST">
                <input type="hidden" name="id" value="<?php echo $room['id']; ?>">
                <label for="room_name">Room Name:</label>
                <input type="text" id="room_name" name="room_name" value="<?php echo $room['room_name']; ?>" required><br><br>

                <label for="room_type">Room Type:</label>
                <input type="text" id="room_type" name="room_type" value="<?php echo $room['room_type']; ?>" required><br><br>

                <label for="price">Price:</label>
                <input type="number" id="price" name="price" value="<?php echo $room['price']; ?>" step="0.01" required><br><br>

                <label for="availability">Availability:</label>
                <select id="availability" name="availability" required>
                    <option value="Available" <?php if ($room['availability'] == 'Available') echo 'selected'; ?>>Available</option>
                    <option value="Unavailable" <?php if ($room['availability'] == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                </select><br><br>

                <label for="description">Description:</label>
                <textarea id="description" name="description" required><?php echo $room['description']; ?></textarea><br><br>

                <input type="submit" name="update" value="Update Room">
            </form>
        <?php } else { ?>
            <p>Room not found!</p>
        <?php } ?>

        <h2>All Rooms</h2>
        <?php
        // Fetch all rooms from the database
        $conn = new mysqli($servername, $username, $password, $dbname);
        $sql = "SELECT * FROM room_info";
        $result = $conn->query($sql);
        ?>

        <table>
            <tr>
                <th>Room Name</th>
                <th>Room Type</th>
                <th>Price</th>
                <th>Availability</th>
                <th>Actions</th>
            </tr>
            <?php while ($room = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $room['room_name']; ?></td>
                    <td><?php echo $room['room_type']; ?></td>
                    <td><?php echo $room['price']; ?></td>
                    <td><?php echo $room['availability']; ?></td>
                    <td><a href="?id=<?php echo $room['id']; ?>" class="action-btn">Edit</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
