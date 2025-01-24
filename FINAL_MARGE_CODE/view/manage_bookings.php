<?php
header("Content-Type: application/json");

// Database connection details
$host = "localhost";
$db_name = "hotel_management";
$username = "root"; // Update with your DB username
$password = ""; // Update with your DB password

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $method = $_SERVER['REQUEST_METHOD'];

    if ($method === 'GET') {
        // Fetch all bookings
        $stmt = $conn->prepare("SELECT * FROM bookings ORDER BY created_at DESC");
        $stmt->execute();
        $bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($bookings);
    } elseif ($method === 'POST') {
        // Add a new booking
        $data = json_decode(file_get_contents("php://input"), true);

        $name = $data['name'];
        $email = $data['email'];
        $check_in = $data['check_in'];
        $check_out = $data['check_out'];
        $guests = $data['guests'];

        $stmt = $conn->prepare("INSERT INTO bookings (name, email, check_in, check_out, guests) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$name, $email, $check_in, $check_out, $guests]);

        echo json_encode(["message" => "Booking created successfully"]);
    } else {
        // Invalid request
        echo json_encode(["error" => "Invalid request"]);
    }
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
