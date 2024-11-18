<?php
    session_start();

    if(isset($_POST['submit'])){

        if (empty($email)) {
            $errors[] = "Email cannot be empty.";
        }
    
        if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email must be a valid email address (e.g., anything@example.com).";
        }
    
        if (!empty($errors)) {
            foreach ($errors as $error) {
            }
        } else {
            echo "found error!";
        }
    }

    
?>