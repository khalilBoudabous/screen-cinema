<?php
include '../controller/OffresC.php';
$Offre = new OffresC();
$Offre->deletOffre($_GET["IdO"]);
header('Location:listOffres.php');
?>
<header>
<nav>
        <section id="navbar-box">
            <div class="navbar">
                <div class="logo"><a href="#">DREAM SCREEN</a></div>
                <ul class="links">
                    <li><a href="C:\Users\khllb\Desktop\New folder (2)\about\about.html">home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Program Today</a></li>
                    <li><a href="#">Buy a ticket</a></li>
                    <li><a href="#">offre</a></li>
                    <li><a href="#">event</a></li>
                </ul>
                <a href="\Users\khllb\Desktop\login page\" class="action_btn">login </a><span class="icon"><ion-icon
                        name="log-in-outline"></ion-icon></span>
            </div>
        </section>
    </nav>
</header>