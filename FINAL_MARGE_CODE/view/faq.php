<?php
// Database connection
$conn = new mysqli('127.0.0.1', 'root', '', 'hotel_management');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch FAQs from the database
$sql = "SELECT * FROM faqs";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel FAQ</title>
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

        .faq-container {
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

        .faq-item {
            margin-bottom: 20px;
            padding: 15px;
            border-bottom: 1px solid #ccc;
        }

        .faq-item:last-child {
            border-bottom: none;
        }

        .question {
            font-weight: bold;
            color: #111a31;
            cursor: pointer;
        }

        .answer {
            margin-top: 10px;
            color: #555;
            display: none;
        }

        .answer.show {
            display: block;
        }

        .policy-link {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #111a31;
            padding: 8px 16px;
            border-radius: 4px;
            color: white;
            text-decoration: none;
        }

        .policy-link:hover {
            background-color: #111a31;
        }
    </style>
    <script>
        // Toggle FAQ answers on click
        function toggleAnswer(event) {
            const answer = event.target.nextElementSibling;
            answer.classList.toggle('show');
        }
    </script>
</head>
<body>

    <div class="faq-container">
        <a href="policy.php" class="policy-link">Hotel Policy</a>
        <h1>Frequently Asked Questions</h1>

        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<div class="faq-item">';
                echo '<div class="question" onclick="toggleAnswer(event)">' . htmlspecialchars($row["question"]) . '</div>';
                echo '<div class="answer">' . htmlspecialchars($row["answer"]) . '</div>';
                echo '</div>';
            }
        } else {
            echo "No FAQs found.";
        }

        $conn->close();
        ?>

    </div>

</body>
</html>
