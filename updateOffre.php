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
    <button><a href="listOffres.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['IdO'])) {
        $Offre = $OffreC->showOffre($_POST['IdO']);

    ?>
        <section class="addoffre-section">
            <form style="height: 55vh!important;" method="POST" class="card-form">
                <div class="inputForm">
                    <label for="IdP">Id Offre :</label>
                    <input type="text" id="IdO" name="IdO" value="<?php echo $_POST['IdO'] ?>" readonly />
                    <span id="erreurIdO" style="color: red"></span>
                </div>
                <div class="inputForm">
                    <label for="FilmPropose">Film Propose :</label>

                    <input type="text" id="FilmPropose" name="FilmPropose" value="<?php echo $Offre['FilmPropose'] ?>" />
                    <span id="erreurFilmPropose" style="color: red"></span>
                </div>
                <div class="inputForm">
                    <label for="Duree">Durée:</label>
                    <input type="text" id="Duree" name="Duree" value="<?php echo $Offre['Duree'] ?>" />
                    <span id="erreurDuree" style="color: red"></span>

                </div>
                <div class="inputForm">
                    <label for="montant">Montant:</label>
                    <input type="text" id="montant" name="montant" value="<?php echo $Offre['montant'] ?>" />
                    <span id="erreurDuree" style="color: red"></span>

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