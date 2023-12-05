<?php

include '../controller/OffresC.php';
include '../model/Offre.php';

$Offre = NULL;
$OffresC = new OffresC();

if (
    isset($_POST["IdO"]) &&
    isset($_POST["FilmPropose"]) &&
    isset($_POST["Duree"])
) {
    if (
        !empty($_POST['IdO']) &&
        !empty($_POST["FilmPropose"]) &&
        !empty($_POST["Duree"])
    ) {
        $Offre = new OffresC(
            null,
            $_POST['IdO'],
            $_POST['FilmPropose'],
            $_POST['Duree']
        );
        $OffresC->addOffre($Offre);
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
    <style>
        label {
            width: 30%;
            display: inline-block;
            text-align: left;
        }

        body {
            width: 50%;
            font-family: arial;
            margin: 5px auto;
            background: #f4f7f8;
            padding: 20px;
            color: #FFFF00;
        }

        fieldset {
            border-radius: 8px;
        }

        legend {
            font-size: 1cm;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="number"] {
            border-radius: 5px;
            padding: 10px;
            width: 70%;
            background-color: #fff;
            margin: 10px;
        }

        input[type="submit"] {
            position: relative;
            padding: 20px;
            font-size: 18px;
            border: 1px solid #16a085;
            border-radius: 2px;
            margin-top: 8px;
            width: 100%;
            font-size: 18px;
            font-style: bold;
            color: #000;
        }

        ul {
            list-style-type: none;
            padding: 20px;
            overflow: hidden;
            margin: 10px;
            background-color: #333;
        }

        li {
            display: inline;
            padding: 10px;
            margin: 10px;
        }

        li a {
            color: white;
            padding: 20px;
            margin: 20px;
        }
    </style>
</head>

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

<body>
    <a href="listOffres.php">Retour à la liste</a>
    <hr>

    <form action="" method="POST">
        <fieldset>
            <legend>Formulaire d'Offre</legend>
            <table>
                <tr>
                    <td><label for="IdO">IdO</label></td>
                    <td>
                        <input type="int" name="IdO" /> <br>
                    </td>
                </tr>
                <tr>
                    <td><label for="FilmPropose">FilmPropose</label></td>
                    <td>
                        <input type="text" name="FilmPropose" /> <br>
                    </td>
                </tr>
                <tr>
                    <td><label for="Duree">Duree</label></td>
                    <td>
                        <input type="text" name="Duree" /> <br>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Enregistrer">
                        <input type="reset" value="Annuler">
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</body>

</html>