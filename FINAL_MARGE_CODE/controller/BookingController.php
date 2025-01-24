<?php
require_once '../model/BookingModel.php';

class BookingController {
    private $model;

    public function __construct() {
        $this->model = new BookingModel();
    }

    // Display all bookings
    public function index() {
        $bookings = $this->model->getAllBookings();
        require 'views/bookings/index.php';
    }

    // Show a form to edit a booking
    public function edit($id) {
        $booking = $this->model->getBookingById($id);
        require 'views/bookings/edit.php';
    }

    // Update booking
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'check_in' => $_POST['check_in'],
                'check_out' => $_POST['check_out'],
                'guests' => $_POST['guests']
            ];
            $this->model->updateBooking($id, $data);
            header('Location: index.php');
        }
    }

    // Delete a booking
    public function delete($id) {
        $this->model->deleteBooking($id);
        header('Location: index.php');
    }
}
?>
