<?php
include '../controller/ProduitsC.php';
include '../model/Produit.php';

$Produit = null;
$ProduitsC = null;
if (

    isset($_POST['NomP']) &&
    isset($_POST['Prix'])
) {
    if (

        !empty($_POST['NomP']) &&
        !empty($_POST['Prix'])
    ) {
        $ProduitsC = new ProduitsC();

        $Produit = new Produit(null, $_POST['NomP'], $_POST['Prix']);
         $ProduitsC->addProduit($Produit);
        /* header('location:text.php'); */
    } else {
        $error = "Informations manquantes";
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
    <div style="display:flex;flex-direction:column;height:100vh; background: radial-gradient(circle,rgba(108, 11, 11, 1) 0%,rgba(0, 0, 0, 1) 100%);">
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

            <form style="height: 55vh!important;" method="POST" class="card-form">
                <h2 style="font-weight: 800;">Ajouter Produit</h2>
                <div class="inputForm">
                    <input type="text" id="NomP" name="NomP" placeholder="Produit" />
                </div>
                <div class="inputForm">
                    <input id="Prix" name="Prix" placeholder="Prix" />
                </div>
                <input type="submit" value="Ajouter" style="width:80px;border:none;padding: 5px;border-radius:5px;font-weight:800" />

            </form>
        </section>
    </div>
</body>



</html>