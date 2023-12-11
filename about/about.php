<?php
session_start();
$Username = isset($_SESSION['Username']) ? $_SESSION['Username'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="style3.css">
</head>

<body>
<audio autoplay loop>
    <source src="\ff\music.mp3" type="audio/mp3">
    
</audio>
    <section id="navbar-box">
        <div class="navbar">
            <div class="logo"><a href="#">DREAM SCREEN</a></div>
            <ul class="links">
                <li><a href="#">home</a></li>
                <li><a href="\ff\about\about.html">About</a></li>
                <li><a href="#">Buy a ticket</a></li>
                <li><a href="#">offre</a></li>
                <li><a href="#">event</a></li>
            </ul>
            
            <p>Welcome: <?php echo $Username; ?>!<style>p{color: white;}</style></p>
            <a href="\ff\about\about.html">dec</a>
            <a id="colorToggleBtn" class="action_btn"><span class="icon"><ion-icon name="contrast-outline"></ion-icon></span></a>
            <a href="\ff\views\adsign-up.php" class="action_btn">log out <span class="icon"><ion-icon name="log-in-outline"></ion-icon></span></a>
        </div>

        <div class="about">
            <div class="heading">
                <h1>about us</h1>
            </div>
            <div class="content">
                <div class="hero-content">
                    <h2>Welcome To Our Website </h2>
                    <p>Welcome to our cinema's virtual home, where the magic of the silver screen comes to life on your
                        screen.
                        We're delighted to have you here, and we hope to be your go-to source for all things
                        movie-related.
                        Whether you're a dedicated cinephile or just looking for
                        a fun night out, our website is your gateway to a world of entertainment.
                    </p>
                    <h3>khllboudabous@gmail.com</h3>
                    <h4>numero : 26770267</h4>
                </div>
                <div class="img-image">
                    <img src="map.jpg">
                </div>
            </div>
        </div>
    </section>
</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="\ff\colorchange.js"></script>
</html>
