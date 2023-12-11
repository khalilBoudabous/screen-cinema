<?php

include '../controller/OffresC.php';
include '../model/Offre.php';
$error = "";

$Offre = null;
$OffreC = new OffresC();

if (
    isset($_POST["IdO"]) &&
    isset($_POST["FilmPropose"]) &&
    isset($_POST["Duree"]) &&
    isset($_POST["montant"])
) {
    if (
        !empty($_POST['IdO']) &&
        !empty($_POST['FilmPropose']) &&
        !empty($_POST["Duree"]) &&
        !empty($_POST["montant"])
    ) {
        $Offre = new Offre(
            $_POST['IdO'],
            $_POST['FilmPropose'],
            $_POST['Duree'],
            $_POST['montant']
        );

        $OffreC->updateOffre($Offre, $_POST['IdO']);

        header('Location:listOffres.php');
    } else {
        $error = "Missing information";
    }
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="newtemplate.css">

    <title>User Display</title>
</head>

<body>
    <header>
        <nav>
            <section id="navbar-box">
                <div class="navbar">
                    <div class="logo"><a style="text-decoration: none;color:white;" href="#">DREAM SCREEN</a></div>
                    <tr>
                        <ul class="links">
                            <th>
                                <li><a style="text-decoration: none;color:white;" href="C:\Users\khllb\Desktop\New folder (2)\about\about.html">home</a></li>
                            </th>
                            <th>
                                <li><a style="text-decoration: none;color:white;" href="#">About</a></li>
                            </th>
                            <th>
                                <li><a style="text-decoration: none;color:white;" href="#">Program Today</a></li>
                            </th>
                            <th>
                                <li><a style="text-decoration: none;color:white;" href="#">Buy a ticket</a></li>
                            </th>
                            <th>
                                <li><a style="text-decoration: none;color:white;" href="#">offre</a></li>
                            </th>
                            <th>
                                <li><a style="text-decoration: none;color:white;" href="#">event</a></li>
                            </th>
                        </ul>
                        <a href="\Users\khllb\Desktop\login page\" class="action_btn">login </a><span class="icon"><ion-icon name="log-in-outline"></ion-icon></span>
                    </tr>
                </div>
            </section>
        </nav>
    </header>
    <button><a href="listProduits.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['IdP'])) {
        $Produit = $ProduitC->showProduit($_POST['IdP']);

    ?>
        <section class="addoffre-section">
            <form style="height: 55vh!important;" method="POST" class="card-form">
                <div class="inputForm">
                    <label for="IdP">IdP :</label>
                    <input type="int" id="IdP" name="IdP" value="<?php echo $_POST['IdP'] ?>" readonly />
                    <span id="erreurIdP" style="color: red"></span>
                </div>
                <div class="inputForm">
                    <label for="NomP">NomP :</label>

                    <input type="text" id="NomP" name="NomP" value="<?php echo $_POST['NomP'] ?>" />
                    <span id="erreurNomP" style="color: red"></span>
                </div>
                <div class="inputForm">
                    <label for="Prix">Prix:</label>
                    <input type="float" id="Prix" name="Prix" value="<?php echo $Produit['Prix'] ?>" />
                    <span id="erreurPrix" style="color: red"></span>

                </div>
                <div class="inputForm">

                    <input type="submit" value="Update">

                </div>

            </form>
        </section>
    <?php
    } else {
        echo "Invalid request.";
    }
    ?>
</body>

</html>