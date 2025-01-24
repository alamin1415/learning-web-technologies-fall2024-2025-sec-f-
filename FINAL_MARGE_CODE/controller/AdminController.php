<?php
require_once "../model/Admin.php";

class AdminController {
    private $admin;

    public function __construct() {
        $this->admin = new Admin();
    }

    public function login($username, $password) {
        $user = $this->admin->login($username, $password);
        if ($user) {
            session_start();
            $_SESSION['admin'] = $user;
            header("Location: ../view/dashboard.php");
        } else {
            header("Location: ../view/login.php?error=Invalid credentials");
        }
    }

    public function displayUsers() {
        return $this->admin->getAllUsers();
    }
}
?>
