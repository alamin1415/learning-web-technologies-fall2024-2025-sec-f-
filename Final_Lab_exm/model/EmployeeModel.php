<?php

function getConnection() {
    $con = mysqli_connect('127.0.0.1', 'root', '', 'shop_management');
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $con;
}

function login($username, $password) {
    $con = getConnection();
    $sql = "SELECT * FROM employees WHERE username='{$username}'";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        // Verify the password using password_verify
        if (password_verify($password, $row['password'])) {
            return true;
        }
    }
    return false;
}

function addEmployee($empname, $contact_no, $username, $password) {
    $con = getConnection();

    // Directly store the password without hashing
    $sql = "INSERT INTO employees (empname, contact_no, username, password) 
            VALUES ('{$empname}', '{$contact_no}', '{$username}', '{$password}')";

    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}

function getUser($id) {
    $con = getConnection();
    $sql = "SELECT * FROM employees WHERE id={$id}";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    } else {
        return null;
    }
}

function getAllUser() {
    $con = getConnection();
    $sql = "SELECT * FROM employees";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $employees = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $employees[] = $row;
        }
        return $employees;
    } else {
        return [];
    }
}

function updateUser($id, $empname, $contact_no, $username, $password = null) {
    $con = getConnection();
    $sql = "UPDATE employees SET empname='{$empname}', contact_no='{$contact_no}', username='{$username}'";

    // Update the password only if provided
    if (!empty($password)) {
        $sql .= ", password='{$password}'";
    }

    $sql .= " WHERE id={$id}";

    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}

function deleteUser($id) {
    $con = getConnection();
    $sql = "DELETE FROM employees WHERE id={$id}";

    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}

?>
