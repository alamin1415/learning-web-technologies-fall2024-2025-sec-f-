<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch hotel information
$sql = "SELECT * FROM hotel_info WHERE id = 1";
$result = $conn->query($sql);
$hotel = $result->fetch_assoc();
$conn->close();

// Convert data to JSON format
$hotel_json = json_encode($hotel);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel About Us</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <header>
            <h1>About Us</h1>
        </header>

        <section id="hotel-info">
            <h2><?php echo $hotel['name']; ?></h2>
            <p><strong>Location:</strong> <?php echo $hotel['location']; ?></p>
            <p><strong>Contact:</strong> <?php echo $hotel['contact']; ?></p>
            <img src="<?php echo $hotel['image_url']; ?>" alt="Hotel Image" class="hotel-image">
            <p><strong>Description:</strong> <?php echo $hotel['description']; ?></p>
            <h3>Our Services</h3>
            <ul id="services-list">
                <!-- Services will be added dynamically using JavaScript -->
            </ul>
        </section>

        <footer>
            <p>&copy; 2025 Hotel Management</p>
        </footer>
    </div>

    <script>
        // Convert PHP JSON data to JavaScript
        const hotelData = <?php echo $hotel_json; ?>;
        
        // Parse services from JSON and display in list
        const services = hotelData.services.split(','); // Assuming services are stored as comma-separated values
        const servicesList = document.getElementById('services-list');
        
        services.forEach(service => {
            const listItem = document.createElement('li');
            listItem.textContent = service.trim();
            servicesList.appendChild(listItem);
        });

        // Example of using XML to fetch data (for future expansion)
        const xmlData = `<hotel>
            <name>${hotelData.name}</name>
            <location>${hotelData.location}</location>
            <contact>${hotelData.contact}</contact>
            <services>${hotelData.services}</services>
        </hotel>`;

        const parser = new DOMParser();
        const xmlDoc = parser.parseFromString(xmlData, "text/xml");
        console.log(xmlDoc.getElementsByTagName('name')[0].childNodes[0].nodeValue); // Outputs hotel name
    </script>
</body>
</html>
