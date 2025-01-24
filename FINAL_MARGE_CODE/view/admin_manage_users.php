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

    if ($action === 'add') {
        // Add user
        $stmt = $pdo->prepare("INSERT INTO user (name, contact_no, username, email) VALUES (?, ?, ?, ?)");
        $success = $stmt->execute([
            $input['name'],
            $input['contact_no'],
            $input['username'],
            $input['email']
        ]);
        echo json_encode(['success' => $success]);
        exit;
    } elseif ($action === 'update') {
        // Update user based on contact number
        $stmt = $pdo->prepare("UPDATE user SET name = ?, username = ?, email = ? WHERE contact_no = ?");
        $success = $stmt->execute([
            $input['name'],
            $input['username'],
            $input['email'],
            $input['contact_no']
        ]);
        echo json_encode(['success' => $success]);
        exit;
    } elseif ($action === 'delete') {
        // Delete user
        $stmt = $pdo->prepare("DELETE FROM user WHERE contact_no = ?");
        $success = $stmt->execute([$input['contact_no']]);
        echo json_encode(['success' => $success]);
        exit;
    }
}

// Fetch users for the initial page load
$stmt = $pdo->query("SELECT * FROM user");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Users</title>
  <link rel="stylesheet" href="../css/manage.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <h2>Manage Users</h2>

  <!-- Add User Form -->
  <h3>Add or Update User</h3>
  <form id="userForm">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>
    <label for="contact_no">Contact:</label>
    <input type="text" id="contact_no" name="contact_no" required><br>
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>
    <button type="submit">Save User</button>
  </form>

  <!-- User Table -->
  <h3>User List</h3>
  <table border="1" id="userTable">
    <thead>
      <tr>
        <th>Contact</th>
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user): ?>
        <tr data-contact="<?= $user['contact_no']; ?>">
          <td><?= $user['contact_no']; ?></td>
          <td><?= $user['name']; ?></td>
          <td><?= $user['username']; ?></td>
          <td><?= $user['email']; ?></td>
          <td>
            <button class="edit">Edit</button>
            <button class="delete">Delete</button>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <script>
    // Handle form submission for adding/updating users
    $('#userForm').on('submit', function(e) {
      e.preventDefault();

      const contact_no = $('#contact_no').val();
      const action = $('input#name').attr('data-update') === 'true' ? 'update' : 'add';
      const userData = {
        action,
        contact_no,
        name: $('#name').val(),
        username: $('#username').val(),
        email: $('#email').val(),
      };

      $.ajax({
        url: '',
        method: 'POST',
        contentType: 'application/json',
        data: JSON.stringify(userData),
        success: function(response) {
          const res = JSON.parse(response);
          if (res.success) {
            alert(`${action === 'add' ? 'Added' : 'Updated'} successfully`);
            location.reload();
          } else {
            alert('Failed to save user');
          }
        }
      });
    });

    // Handle delete button
    $('#userTable').on('click', '.delete', function() {
      const contact_no = $(this).closest('tr').data('contact');

      if (confirm('Are you sure you want to delete this user?')) {
        $.ajax({
          url: '',
          method: 'POST',
          contentType: 'application/json',
          data: JSON.stringify({ action: 'delete', contact_no }),
          success: function(response) {
            const res = JSON.parse(response);
            if (res.success) {
              alert('Deleted successfully');
              location.reload();
            } else {
              alert('Failed to delete user');
            }
          }
        });
      }
    });

    // Handle edit button
    $('#userTable').on('click', '.edit', function() {
      const row = $(this).closest('tr');
      const contact_no = row.data('contact');
      const name = row.find('td:nth-child(2)').text();
      const username = row.find('td:nth-child(3)').text();
      const email = row.find('td:nth-child(4)').text();

      $('#contact_no').val(contact_no).attr('readonly', true);
      $('#name').val(name).attr('data-update', 'true');
      $('#username').val(username);
      $('#email').val(email);
    });
  </script>
</body>
</html>
