<?php

function getConnection() {
    $con = mysqli_connect('127.0.0.1', 'root', '', 'emp');
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $con;
}

function login($username, $password) {
    $con = getConnection();
    $sql = "SELECT * FROM employees WHERE username = '{$username}' AND password = '{$password}'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        return true;
    } else {
        return false;
    }
}

function addEmployee($empname, $contact_no, $username, $password) {
    if (empty($empname) || empty($contact_no) || empty($username) || empty($password)) {
        echo "Error: All fields are required.";
        return false;
    }

    $con = getConnection();
    $sql = "INSERT INTO employees (empname, contact_no, username, password) 
            VALUES ('{$empname}', '{$contact_no}', '{$username}', '{$password}')";
    if (mysqli_query($con, $sql)) {
        echo "Query was successful.";
        return true;
    } else {
        echo "Query was not successful.";
        printf("Error message: %s\n", mysqli_error($con));
        return false;
    }
}

function getEmployee($id) {
    $con = getConnection();
    $sql = "SELECT * FROM employees WHERE id = {$id}";
    $result = mysqli_query($con, $sql);

    if ($result) {
        return mysqli_fetch_assoc($result);
    } else {
        return null;
    }
}

function getAllEmployee() {
    $con = getConnection();
    $sql = "SELECT * FROM employees";
    $result = mysqli_query($con, $sql);
    $employees = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $employees[] = $row;
    }

    return $employees;
}

function updateEmployee($employee) {
    if (empty($employee['empname']) || empty($user['contact_no']) || empty($user['username']) || empty($user['password']) || empty($user['id'])) {
        echo "Error: Missing required fields.";
        return false;
    }

    $con = getConnection();
    $sql = "UPDATE employees SET 
            empname = '{$employee['empname']}', 
            contact_no = '{$employee['contact_no']}', 
            username = '{$employee['username']}', 
            password = '{$employee['password']}' 
            WHERE id = {$employee['id']}";
    return mysqli_query($con, $sql);
}

function deleteEmployee($id) {
    $con = getConnection();
    $sql = "DELETE FROM employees WHERE id = {$id}";
    return mysqli_query($con, $sql);
}

?>
