<?php
session_start();
$Username = isset($_SESSION['Username']) ? $_SESSION['Username'] : '';
?>
<?php

include '../controller/OffresC.php';
include '../model/Offre.php';


$offrec=null;
$offrec = new OffresC();
$offre = null ; 
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
        $offre = new Offre( null,$_POST['FilmPropose'], $_POST['Duree'],
        $_POST['montant']);

        $offrec->addOffre($offre);
        header('Location:listOffres.php');
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
    <link rel="stylesheet" href="\ff\Css\chaymatemplate.css">
    
</head>



<body>
    <div style=" width: 100%;
    height: 120vh;
    background:url('../image_music/image4.jpg') no-repeat ;
    background-size: cover;
    background-position: center;   ">
<header>
    <nav>
    <section id="navbar-box">
        <div class="navbar">
            <div class="logo"><a href="#">DREAM SCREEN</a></div>
            <ul class="links">
    
            <li><a href="listsign-up.php">list sign-up</a></li>
            <li><a href="showfilm.php">list film</a></li><li>
            <li><a href="listOffres.php">list Ofeeres</a></li>
            <li><a href="listProduits.php">list Produits</a></li>
            <li><a href="showevents.php">list evenement</a></li>

           
            </ul>
            <p>Welcome: <?php echo $Username; ?><style>p { color: white; }</style>
            <button id="colorToggleBtn" class="action_btn"><ion-icon name="contrast-outline"></ion-icon></button>
            <a href="login.php" class="action_btn" class=>login <span class="icon"><ion-icon name="log-in-outline"></ion-icon></span></a>
            </div>



</section>
    </nav>
</header>
<section class="addoffre-section">

            <form action="" method="POST" class="card-form">
                <h2 style="font-weight: 800;">Créer Votre Offre</h2>
                <div class="inputForm">
                    <input type="text" id="montant" name="montant" placeholder="montant" />
                </div>
                <div class="inputForm">
                    <input  id="FilmPropose" name="FilmPropose" placeholder="FilmPropose" />
                </div>
                <div class="inputForm">
                    <input type="text" id="Duree" name="Duree" placeholder="Duree" />
                </div>
                <div class="inputForm">
                    <input type="submit" value="Ajouter" />
                </div>
        </form>
    </section>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>