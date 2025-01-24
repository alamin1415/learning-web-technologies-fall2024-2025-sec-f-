<!-- views/admin/dashboard.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <h1>Welcome to Admin Dashboard</h1>
    </header>

    <div>
        <h2>Manage Rooms</h2>
        <a href="index.php?page=rooms&action=manage">Manage Rooms</a>
    </div>

    <div>
        <h2>Manage Facilities</h2>
        <a href="index.php?page=facilities&action=manage">Manage Facilities</a>
    </div>

    <div>
        <h2>Manage Contact Queries</h2>
        <a href="index.php?page=contact&action=view">View Contact Queries</a>
    </div>

    <footer>
        <p>&copy; 2025 Hotel Management System</p>
    </footer>
</body>
</html>
