<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate Our Service</title>
    <link rel="stylesheet" href="../css/rating.css">
</head>
<body>

<header>
    <h1>Rate Our Service</h1>
</header>

<nav>
    <ul>
        <li><a href="manage_booking.php">Manage Booking</a></li>
        <li><a href="about_us.php">About Us</a></li>
        <li><a href="rating.php">Rating</a></li>
        <li><a href="faq.php">FAQ</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</nav>

<main>
    <h2>We Value Your Feedback</h2>
    <form action="../controllers/RatingController.php" method="POST">
        <input type="text" name="user_name" placeholder="Enter your name" required>
        <select name="rating" required>
            <option value="" disabled selected>Rate us (1-5)</option>
            <option value="1">1 - Poor</option>
            <option value="2">2 - Fair</option>
            <option value="3">3 - Good</option>
            <option value="4">4 - Very Good</option>
            <option value="5">5 - Excellent</option>
        </select>
        <textarea name="feedback" rows="4" placeholder="Write your feedback" required></textarea>
        <button type="submit">Submit Rating</button>
    </form>
</main>

<footer>
    <p>&copy; 2025 Hotel Management System</p>
</footer>

</body>
</html>
