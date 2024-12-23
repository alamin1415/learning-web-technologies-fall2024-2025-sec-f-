<?php

function getConnection() {
    $con = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $con;
}

function login($username, $password) {
    $con = getConnection();
    $sql = "SELECT * FROM users WHERE username='{$username}' AND password='{$password}'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    mysqli_close($con);
    return $count == 1;
}

function addUser($username, $password, $email) {
    $con = getConnection();
    $sql = "INSERT INTO users (username, password, email) VALUES ('{$username}', '{$password}', '{$email}')";
    $status = mysqli_query($con, $sql);
    mysqli_close($con);
    return $status;
}

function getUser($id) {
    $con = getConnection();
    $sql = "SELECT * FROM users WHERE id='{$id}'";
    $result = mysqli_query($con, $sql);
    $user = mysqli_fetch_assoc($result);

    mysqli_close($con);
    return $user;
}

function getAllUser() {
    $con = getConnection();
    $sql = "SELECT * FROM users";
    $result = mysqli_query($con, $sql);

    $users = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }

    mysqli_close($con);
    return $users;
}

function updateUser($id, $username, $password, $email) {
    $con = getConnection();
    $sql = "UPDATE users SET username='{$username}', password='{$password}', email='{$email}' WHERE id='{$id}'";
    $status = mysqli_query($con, $sql);

    mysqli_close($con);
    return $status;
}

function deleteUser($id) {
    $con = getConnection();
    $sql = "DELETE FROM users WHERE id='{$id}'";
    $status = mysqli_query($con, $sql);

    mysqli_close($con);
    return $status;
}

function resetPassword($id, $newPassword) {
    $con = getConnection();
    $sql = "UPDATE users SET password='{$newPassword}' WHERE id='{$id}'";
    $status = mysqli_query($con, $sql);

    mysqli_close($con);
    return $status;
}
?>
