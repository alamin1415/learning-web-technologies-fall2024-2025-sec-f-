<?php
$servername = "localhost";
$username = "root"; // Use your database username
$password = ""; // Use your database password
$dbname = "hotel_management";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// Handle add, edit, and delete actions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_booking'])) {
        $hotel_id = $_POST['hotel_id'];
        $guest_name = $_POST['guest_name'];
        $check_in_date = $_POST['check_in_date'];
        $check_out_date = $_POST['check_out_date'];
        $contact = $_POST['contact'];
        $status = $_POST['status'];
        $total_price = $_POST['total_price'];

        $sql = "INSERT INTO booking_info (hotel_id, guest_name, check_in_date, check_out_date, contact, status, total_price)
                VALUES ('$hotel_id', '$guest_name', '$check_in_date', '$check_out_date', '$contact', '$status', '$total_price')";
        $conn->query($sql);
    } elseif (isset($_POST['edit_booking'])) {
        $booking_id = $_POST['booking_id'];
        $status = $_POST['status'];

        $sql = "UPDATE booking_info SET status='$status' WHERE id='$booking_id'";
        $conn->query($sql);
    } elseif (isset($_POST['delete_booking'])) {
        $booking_id = $_POST['booking_id'];

        $sql = "DELETE FROM booking_info WHERE id='$booking_id'";
        $conn->query($sql);
    }
}

// Fetch all bookings
$sql = "SELECT b.id, h.name AS hotel_name, b.guest_name, b.check_in_date, b.check_out_date, b.status, b.total_price
        FROM booking_info b
        JOIN hotel_info h ON b.hotel_id = h.id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Booking Management</title>
    <link rel="stylesheet" href="../css/booking.css">

</head>
<body>
    <h1>Booking Management</h1>

    <!-- Add booking form -->
    <h2>Add New Booking</h2>
    <form method="POST">
        <label for="hotel_id">Hotel ID:</label>
        <input type="number" name="hotel_id" required><br>
        <label for="guest_name">Guest Name:</label>
        <input type="text" name="guest_name" required><br>
        <label for="check_in_date">Check-in Date:</label>
        <input type="date" name="check_in_date" required><br>
        <label for="check_out_date">Check-out Date:</label>
        <input type="date" name="check_out_date" required><br>
        <label for="contact">Contact:</label>
        <input type="text" name="contact" required><br>
        <label for="status">Status:</label>
        <select name="status">
            <option value="Pending">Pending</option>
            <option value="Confirmed">Confirmed</option>
            <option value="Checked-In">Checked-In</option>
            <option value="Checked-Out">Checked-Out</option>
            <option value="Cancelled">Cancelled</option>
        </select><br>
        <label for="total_price">Total Price:</label>
        <input type="number" step="0.01" name="total_price" required><br>
        <button type="submit" name="add_booking">Add Booking</button>
    </form>

    <!-- List all bookings -->
    <h2>All Bookings</h2>
    <table border="1">
        <tr>
            <th>Booking ID</th>
            <th>Hotel Name</th>
            <th>Guest Name</th>
            <th>Check-in Date</th>
            <th>Check-out Date</th>
            <th>Status</th>
            <th>Total Price</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['hotel_name']; ?></td>
            <td><?php echo $row['guest_name']; ?></td>
            <td><?php echo $row['check_in_date']; ?></td>
            <td><?php echo $row['check_out_date']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><?php echo $row['total_price']; ?></td>
            <td>
                <!-- Edit and delete booking -->
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="booking_id" value="<?php echo $row['id']; ?>">
                    <select name="status">
                        <option value="Pending" <?php echo ($row['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                        <option value="Confirmed" <?php echo ($row['status'] == 'Confirmed') ? 'selected' : ''; ?>>Confirmed</option>
                        <option value="Checked-In" <?php echo ($row['status'] == 'Checked-In') ? 'selected' : ''; ?>>Checked-In</option>
                        <option value="Checked-Out" <?php echo ($row['status'] == 'Checked-Out') ? 'selected' : ''; ?>>Checked-Out</option>
                        <option value="Cancelled" <?php echo ($row['status'] == 'Cancelled') ? 'selected' : ''; ?>>Cancelled</option>
                    </select>
                    <button type="submit" name="edit_booking">Update Status</button>
                </form>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="booking_id" value="<?php echo $row['id']; ?>">
                    <button type="submit" name="delete_booking">Delete</button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
