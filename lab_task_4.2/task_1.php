<?php
session_start();

if (isset($_POST['submit'])) {
    $name = trim($_REQUEST['name']);
    $errors = [];

    if ($name == null) {
        echo "Null data found!";
    } else {
        if (str_word_count($name) < 2) {
            $errors[] = "Name must contain at least two words.";
        }

        if (!preg_match('/^[a-zA-Z]/', $name)) {
            $errors[] = "Name must start with a letter.";
        }

        if (!preg_match('/^[a-zA-Z.\- ]+$/', $name)) {
            $errors[] = "Name can only contain letters, periods, dashes, and spaces.";
        }

        if (empty($errors)) {
            $_SESSION['flag'] = true;
            $_SESSION['name'] = $name;
            header('location: task_2.php');
        } else {
            foreach ($errors as $error) {
                echo " found error!";
            }
        }
    }
} else {
    header('location: task_1.html');
}
?>
