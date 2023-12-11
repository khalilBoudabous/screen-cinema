<?php

include '../controller/OffresC.php';
include '../model/Offre.php';


$offrec = null;
$offrec = new OffresC();
$offre = null;
if (
    isset($_POST["montant"]) &&
    isset($_POST["FilmPropose"]) &&
    isset($_POST["Duree"])
) {
    if (
        !empty($_POST['montant']) &&
        !empty($_POST["FilmPropose"]) &&
        !empty($_POST["Duree"])
    ) {

        $offre = new Offre(null, $_POST['FilmPropose'], $_POST['Duree'], $_POST['montant']);
        $offrec->addOffre($offre);
        header('Location: listOffres.php');
    } else {
        $error = "Missing information";
    }
}


?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Offre</title>
    <link rel="stylesheet" href="newtemplate.css">

</head>



<body>
    <div style="display:flex;flex-direction:column;background: radial-gradient( circle, rgba(108, 11, 11, 1) 0%, rgba(0, 0, 0, 1) 100% );">
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
                        <a href="\Users\khllb\Desktop\login page\" class="action_btn">login </a><span class="icon"><ion-icon name="log-in-outline"></ion-icon></span>
                    </div>
                </section>
            </nav>
        </header>
        <section class="addoffre-section">

            <form action="" method="POST" class="card-form">
                <h2 style="font-weight: 800;">Créer Votre Offre</h2>
                <div class="inputForm">
                    <input type="text" id="montant" name="montant" placeholder="Montant" />
                </div>
                <div class="inputForm">
                    <input type="text" id="FilmPropose" name="FilmPropose" placeholder="Film Proposé" />
                </div>
                <div class="inputForm">
                    <input type="text" id="Duree" name="Duree" placeholder="Durée" />
                </div>
                <div class="inputForm">
                    <input type="submit" value="Ajouter" />
                </div>
            </form>

        </section>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>



</html>