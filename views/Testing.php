<?php
session_start();
$Username = isset($_SESSION['Username']) ? $_SESSION['Username'] : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\ff\Css\template2.css">

    <title>Cinema Ticket Reservation</title>
</head>

<body>
    <section class="navbar-box">
        <div class="navbar">
            <div class="logo"><a href="#">DREAM SCREEN</a></div>
            <ul class="links">

                <li><a href="template.php">home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="Testing.php">Buy a ticket</a></li>
                <li><a href="frontoffres.php">offre</a></li>
                <li><a href="#">event</a></li>
            </ul>
            <p>Welcome: <?php echo $Username; ?><style>p { color: white; }</style>
            </p>
            <a href="adsign-up.php">dec</a>
            <a id="colorToggleBtn" class="action_btn"><span class="icon"><ion-icon name="contrast-outline"></ion-icon></span></a>
            <a href="login.php" class="action_btn">login <span class="icon"><ion-icon name="log-in-outline"></ion-icon></span></a>
        </div>
    </section>

    <div class="container2">
        <h2 class="heading">🎫 Ticket Reservation 🎭</h2>
        <div class="container">
            
            <form id="reservationForm">
                <div class="form-group">
                    <label class="label">Number of Tickets:</label>
                    <input placeholder="0" type="number" min="0" max="50" class="input-field" id="numTickets" name="numTickets"
                        required>
                </div>

                <div class="seat-selection">
                    <!-- Add your seat selection elements here -->
                </div>

                <div class="form-group payment-method">
                    <label class="label">Payment Method:</label>
                    <select class="input-field" id="paymentMethod" name="paymentMethod" required>
                        <option value="none" selected hidden>Select Option</option>
                        <option value="credit">Credit Card 💳</option>
                        <option value="debit">Cash 💸</option>
                        <option value="paypal">PayPal 😊</option>
                    </select>
                </div>
                <center>

                    <div class="form-group">
                        <button type="submit" class="button">Reserve Tickets</button>
                    </div>
                </center>

                <div id="errorMessage" class="error-message"></div>
            </form>
            <img id="film-img" src="\ff\image_music\film_1.webp" alt="img">
        </div>
    </div>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
