<?php
// Database connection
$conn = new mysqli('127.0.0.1', 'root', '', 'hotel_management');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch highlights from the database
$sql = "SELECT * FROM highlights";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Highlights</title>
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

        .highlight-container {
            background-color: white;
            width: 80%;
            max-width: 1000px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            padding: 10px 0;
        }

        .gallery-item {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            text-align: center;
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .gallery-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }

        .gallery-item p {
            margin-top: 10px;
            color: #555;
        }

        .back-link {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #111a31;
            padding: 8px 16px;
            border-radius: 4px;
            color: white;
            text-decoration: none;
        }

        .back-link:hover {
            background-color: #111a31;
        }

    </style>
</head>
<body>

    <div class="highlight-container">
        <a href="accessibility.php" class="back-link">Back to Accessibility</a>
        <h1>The Highlights</h1>

        <?php
        if ($result->num_rows > 0) {
            echo "<div class='gallery'>";
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div class='gallery-item'>";
                echo "<img src='" . $row["image_url"] . "' alt='" . $row["title"] . "'>";
                echo "<p><b>" . $row["title"] . "</b><br>" . $row["description"] . "</p>";
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "No highlights found.";
        }

        $conn->close();
        ?>

    </div>

</body>
</html>
