<?php

function getConnection() {
    $con = mysqli_connect('127.0.0.1', 'root', '', 'hotel_management');
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $con;
}

function addRating($userName, $rating, $feedback) {
    // Establish the database connection using the getConnection function
    $con = getConnection();

    // Prepare the SQL query with placeholders
    $query = "INSERT INTO user_ratings (user_name, rating, feedback) VALUES (?, ?, ?)";
    $stmt = $con->prepare($query);

    if (!$stmt) {
        die("Prepare statement failed: " . $con->error);
    }

    // Bind parameters to the prepared statement
    $stmt->bind_param("sis", $userName, $rating, $feedback);

    // Execute the statement
    $result = $stmt->execute();

    if (!$result) {
        die("Execution failed: " . $stmt->error);
    }

    // Close the statement and connection
    $stmt->close();
    $con->close();

    // Return the result of the execution
    return $result;
}
?>
