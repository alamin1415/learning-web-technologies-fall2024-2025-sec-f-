<?php 
// Database connection
$conn = new mysqli('127.0.0.1', 'root', '', 'hotel_management');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch accessibility features from the database
$sql = "SELECT * FROM accessibility";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Accessibility</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .accessibility-container {
            background-color: white;
            width: 80%;
            max-width: 800px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .feature-item {
            margin-bottom: 20px;
            padding: 15px;
            border-bottom: 1px solid #ccc;
        }

        .feature-item:last-child {
            border-bottom: none;
        }

        .feature-title {
            font-weight: bold;
            color: #111a31;
            cursor: pointer;
        }

        .feature-description {
            margin-top: 10px;
            color: #555;
            display: none; /* Initially hide the description */
        }

        .feature-description.show {
            display: block; /* Show when toggled */
        }

        .faq-link {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #111a31;
            padding: 8px 16px;
            border-radius: 4px;
            color: white;
            text-decoration: none;
        }

        .faq-link:hover {
            background-color: #111a31;
        }

    </style>
    <script>
        // Toggle feature description visibility on click
        function toggleFeatureDescription(event) {
            const description = event.target.nextElementSibling;
            description.classList.toggle('show');
        }
    </script>
</head>
<body>

    <div class="accessibility-container">
        <a href="faq.php" class="faq-link">FAQ</a>
        <h1>Hotel Accessibility</h1>

        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<div class="feature-item">';
                echo '<div class="feature-title" onclick="toggleFeatureDescription(event)">' . htmlspecialchars($row["feature_title"]) . '</div>';
                echo '<div class="feature-description">' . htmlspecialchars($row["feature_description"]) . '</div>';
                echo '</div>';
            }
        } else {
            echo "No accessibility features found.";
        }

        $conn->close();
        ?>

    </div>

</body>
</html>
