<?php

function getConnection() {
    $con = mysqli_connect('127.0.0.1', 'root', '', 'hotel_management');
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $con;
}

function login($username, $password) {
    $con = getConnection();
    $sql = "SELECT * FROM user WHERE username = '{$username}' AND password = '{$password}'";
    $result = mysqli_query($con, $sql);
    return mysqli_num_rows($result) === 1;
}

function addUser($name, $contact_no, $password, $username) {
    $con = getConnection();
    $sql = "INSERT INTO user (name, contact_no, password, username) VALUES ('{$name}', '{$contact_no}', '{$password}', '{$username}')";
    return mysqli_query($con, $sql);
}

function getUserByUsername($username) {
    $con = getConnection();
    $sql = "SELECT * FROM user WHERE username = '{$username}'";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_assoc($result);
}

function checkIfUsernameExists($username) {
    $con = getConnection();
    $sql = "SELECT COUNT(*) AS count FROM user WHERE username = '{$username}'";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);
    return $data['count'] > 0;
}

function getAllUsers() {
    $con = getConnection();
    $sql = "SELECT * FROM user";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function searchUsers($searchTerm) {
    $con = getConnection();
    $sql = "SELECT * FROM user WHERE username LIKE '%{$searchTerm}%'";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function updateUser($name, $contact_no, $password, $username) {
    $con = getConnection();
    $sql = "UPDATE user SET name='{$name}', contact_no='{$contact_no}', password='{$password}' WHERE username='{$username}'";
    return mysqli_query($con, $sql);
}

function deleteUser($username) {
    $con = getConnection();
    $sql = "DELETE FROM user WHERE username='{$username}'";
    return mysqli_query($con, $sql);
}

/**
 * Add a rating to the database.
 * 
 * @param string $userName The name of the user providing the rating.
 * @param int $rating The rating score (1-5).
 * @param string $feedback The feedback or comments provided by the user.
 * @return bool True if the insertion is successful, false otherwise.
 */
function addRating($userName, $rating, $feedback) {
    $con = getConnection();
    $sql = "INSERT INTO user_ratings (user_name, rating, feedback) VALUES ('{$userName}', '{$rating}', '{$feedback}')";
    return mysqli_query($con, $sql);
}
?>
