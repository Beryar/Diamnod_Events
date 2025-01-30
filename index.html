<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diamond Events</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Navigation -->
    <div class="navbar">
        <div class="logo">Diamond Events</div>
        <ul>
            <li><a href="#reservation">Reservation</a></li>
            <li><a href="#gallery">Artists</a></li>
            <li><a href="#gallery2">Presenters</a></li>
            <li><a href="#footer">Contact</a></li>
        </ul>
    </div>

    <!-- Hero Section -->
    <div class="begin">
        <img id="poster" src="img/poster.jpg" alt="Event">
        <br>
        <a href="#reservation"><button>Buy now</button></a>
    </div>

    <!-- Gallery Section -->
    <div id="gallery">
        <h2>Our Featured Artists</h2>
        <div class="gallery-container">
            <div class="gallery-item"><img src="img/dilo.jpeg" alt="Singer 1"></div>
            <div class="gallery-item"><img src="img/dilo.jpeg" alt="Singer 2"></div>
            <div class="gallery-item"><img src="img/dilo.jpeg" alt="Singer 3"></div>
            <div class="gallery-item"><img src="img/dilo.jpeg" alt="Singer 4"></div>
            <div class="gallery-item"><img src="img/dilo.jpeg" alt="Singer 5"></div>
            <div class="gallery-item"><img src="img/dilo.jpeg" alt="Singer 6"></div>
        </div>
    </div>

    <div id="gallery">
        <h2>Our Featured Presenters</h2>
        <div class="gallery-container">
            <div class="gallery-item"><img src="img/dilo.jpeg" alt="Presenter 1"></div>
            <div class="gallery-item"><img src="img/dilo.jpeg" alt="Presenter 2"></div>
        </div>
    </div>

    <!-- Reservation Form -->
    <div id="reservation">
        <h2>Reserve Your Spot</h2>
        <div class="form-container">
            <form method="POST" action="">
                <input type="text" placeholder="Naam" required name="naam">
                <input type="email" placeholder="Email" required name="email">
                
                <!-- Normal Ticket Section -->
                <h3>Normal Ticket</h3>
                <input type="number" placeholder="Normal tickets" required name="normal_tickets" min="0">
                
                <!-- Children Ticket Section -->
                <h3>Children Ticket</h3>
                <input type="number" placeholder="Children tickets" required name="children_tickets" min="0">
                
                <button type="submit">Submit</button>
            </form>
            <img src="img/logoD.jpg" alt="Event Image">
        </div>
    </div>

    <!-- Footer -->
    <div id="footer">
        <div class="logo">Diamond Events</div><br>
        <div class="social-icons">
            <a href="https://www.facebook.com/diamondevent222025" target="blank"><img src="img/facebook.png" alt="Facebook"></a>
            <a href="https://www.instagram.com/diamondevent222025/" target="blank"><img src="img/instagram.png" alt="Instagram"></a>
            <a href="https://www.tiktok.com/@diamond1event" target="blank"><img src="img/tiktok.png" alt="TikTok"></a>
        </div>
        <p>© 2025 Diamond Event. All Rights Reserved. | Privacy Policy | Terms of Service</p>
    </div>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "diamond";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $naam = $conn->real_escape_string($_POST['naam']);
        $email = $conn->real_escape_string($_POST['email']);
        $normal_tickets = $conn->real_escape_string($_POST['normal_tickets']);
        $children_tickets = $conn->real_escape_string($_POST['children_tickets']);

        // Prepared statement to insert the form data into the reservations table
        $sql = "INSERT INTO reservations (naam, email, normal_tickets, children_tickets) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssii", $naam, $email, $normal_tickets, $children_tickets);

        if ($stmt->execute()) {
            header("Location: index.php");  // Correctly formatted header for redirection
            exit();  // Ensures no further code is executed after the redirect
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
    ?>

</body>
</html>
