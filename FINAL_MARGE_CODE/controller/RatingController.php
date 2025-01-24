<?php
require_once '../models/Rating.php';

$db = (new Database())->connect();
$ratingModel = new Rating($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userName = htmlspecialchars($_POST['user_name']);
    $rating = intval($_POST['rating']);
    $feedback = htmlspecialchars($_POST['feedback']);

    if ($ratingModel->addRating($userName, $rating, $feedback)) {
        header("Location: ../views/rating_success.php");
    } else {
        echo "Failed to submit your rating. Please try again.";
    }
}
?>
