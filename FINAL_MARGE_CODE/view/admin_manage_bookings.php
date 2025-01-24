<?php
// Database connection
$host = '127.0.0.1';
$dbname = 'hotel_management';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Handle AJAX requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents("php://input"), true);
    $action = $input['action'];

    if ($action === 'update') {
        // Update booking
        $stmt = $pdo->prepare("UPDATE bookings SET name = ?, email = ?, check_in = ?, check_out = ?, guests = ? WHERE id = ?");
        $success = $stmt->execute([
            $input['name'],
            $input['email'],
            $input['check_in'],
            $input['check_out'],
            $input['guests'],
            $input['id']
        ]);
        echo json_encode(['success' => $success]);
        exit;
    } elseif ($action === 'cancel') {
        // Cancel booking
        $stmt = $pdo->prepare("DELETE FROM bookings WHERE id = ?");
        $success = $stmt->execute([$input['id']]);
        echo json_encode(['success' => $success]);
        exit;
    }
}

// Fetch bookings for the initial page load
$stmt = $pdo->query("SELECT * FROM bookings");
$bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Bookings</title>
  <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
  <h2>Manage Bookings</h2>

  <!-- Update Booking Form -->
  <h3>Update Booking</h3>
  <form id="bookingForm">
    <input type="hidden" id="bookingId">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>
    <label for="check_in">Check-in:</label>
    <input type="date" id="check_in" name="check_in" required><br>
    <label for="check_out">Check-out:</label>
    <input type="date" id="check_out" name="check_out" required><br>
    <label for="guests">Guests:</label>
    <input type="number" id="guests" name="guests" required><br>
    <button type="submit">Update Booking</button>
  </form>

  <!-- Booking Table -->
  <h3>Booking List</h3>
  <table border="1" id="bookingTable">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Check-in</th>
        <th>Check-out</th>
        <th>Guests</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($bookings as $booking): ?>
        <tr data-id="<?= $booking['id']; ?>">
          <td><?= $booking['id']; ?></td>
          <td><?= $booking['name']; ?></td>
          <td><?= $booking['email']; ?></td>
          <td><?= $booking['check_in']; ?></td>
          <td><?= $booking['check_out']; ?></td>
          <td><?= $booking['guests']; ?></td>
          <td>
            <button class="edit">Edit</button>
            <button class="cancel">Cancel</button>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <script>
    // Handle form submission for updating a booking
    document.getElementById('bookingForm').addEventListener('submit', function(e) {
      e.preventDefault();

      const bookingData = {
        action: 'update',
        id: document.getElementById('bookingId').value,
        name: document.getElementById('name').value,
        email: document.getElementById('email').value,
        check_in: document.getElementById('check_in').value,
        check_out: document.getElementById('check_out').value,
        guests: document.getElementById('guests').value,
      };

      fetch('', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(bookingData)
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          alert('Booking updated successfully');
          location.reload();
        } else {
          alert('Failed to update booking');
        }
      })
      .catch(error => alert('Error: ' + error));
    });

    // Handle cancel button
    document.getElementById('bookingTable').addEventListener('click', function(e) {
      if (e.target && e.target.classList.contains('cancel')) {
        const id = e.target.closest('tr').getAttribute('data-id');
        if (confirm('Are you sure you want to cancel this booking?')) {
          fetch('', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify({ action: 'cancel', id: id })
          })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              alert('Booking canceled successfully');
              location.reload();
            } else {
              alert('Failed to cancel booking');
            }
          })
          .catch(error => alert('Error: ' + error));
        }
      }
    });

    // Handle edit button
    document.getElementById('bookingTable').addEventListener('click', function(e) {
      if (e.target && e.target.classList.contains('edit')) {
        const row = e.target.closest('tr');
        const id = row.getAttribute('data-id');
        const name = row.children[1].textContent;
        const email = row.children[2].textContent;
        const check_in = row.children[3].textContent;
        const check_out = row.children[4].textContent;
        const guests = row.children[5].textContent;

        document.getElementById('bookingId').value = id;
        document.getElementById('name').value = name;
        document.getElementById('email').value = email;
        document.getElementById('check_in').value = check_in;
        document.getElementById('check_out').value = check_out;
        document.getElementById('guests').value = guests;
      }
    });
  </script>
</body>
</html>
