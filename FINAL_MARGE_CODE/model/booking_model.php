<?php
// BookingModel.php

// Database connection function
function getConnection() {
    $con = mysqli_connect('127.0.0.1', 'root', '', 'hotel_management');
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $con;
}

class BookingModel {
    private $pdo;

    public function __construct() {
        $this->pdo = $this->connectPdo();
    }

    // PDO connection setup
    private function connectPdo() {
        try {
            $pdo = new PDO("mysql:host=127.0.0.1;dbname=hotel_management", 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    // Fetch all bookings
    public function getAllBookings() {
        $stmt = $this->pdo->query("SELECT * FROM bookings ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fetch a single booking by ID
    public function getBookingById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM bookings WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update a booking
    public function updateBooking($id, $data) {
        $stmt = $this->pdo->prepare("UPDATE bookings SET name = :name, email = :email, check_in = :check_in, check_out = :check_out, guests = :guests WHERE id = :id");
        return $stmt->execute([
            'name' => $data['name'],
            'email' => $data['email'],
            'check_in' => $data['check_in'],
            'check_out' => $data['check_out'],
            'guests' => $data['guests'],
            'id' => $id,
        ]);
    }

    // Delete a booking
    public function deleteBooking($id) {
        $stmt = $this->pdo->prepare("DELETE FROM bookings WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
?>
