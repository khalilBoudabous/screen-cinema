<?php
include '../controller/filmc.php';
include '../model/film.php';

include '../controller/categoriec.php';
$error = "";
$filmc = null;
$filmc = new filmc();
$categoriec = null;
$categoriec = new categoriec();

if (
    isset($_POST["titre_film"]) &&
    isset($_POST["duree"]) &&
    isset($_POST["realisateur"]) &&
    isset($_POST["etoils"]) &&
    !empty($_POST["type_c"])
) {

    if (
        !empty($_POST["titre_film"]) &&
        !empty($_POST["duree"]) &&
        !empty($_POST["realisateur"]) &&
        !empty($_POST["etoils"]) &&
        !empty($_POST["type_c"])
    ) {
        $film = new film(
            null,
            $_POST["titre_film"],
            $_POST["duree"],
            $_POST["realisateur"],
            $_POST["etoils"],
            $_POST["type_c"]
        );
        $categorie = new categorie(null, $_POST["type_c"]);
        $filmc->addFilm($film, $categorie);
        header('Location: showfilm.php');
    } else {
        $error = "Missing information";
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./Css/addFilm.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <title>Ajouter Film</title>
</head>

<body>

    <div class="addFilm-section">
        <div class="card">

            <form action="addfilm.php" method="POST" class="card-form">
                <div class="input">
                    <label class="input-label">Titre du Film</label>
                    <input type="text" class="input-field" id="titre_film" name="titre_film" />

                </div>
                <div class="input">
                    <label class="input-label">Durée</label>
                    <input type="text" class="input-field" id="duree" name="duree" />

                </div>
                <div class="input">
                    <label class="input-label">Directeur</label>
                    <input type="text" class="input-field" id="realisateur" name="realisateur" />

                </div>


                <div class="input">
                    <label class="input-label">Rating</label>
                    <input type="text" class="input-field" id="etoils" name="etoils" />

                </div>
                    <select name="type_c" id="type_c">
                        <option value="drama">drama</option>
                        <option value="aventure">aventure</option>
                        <option value="action">action</option>
                    </select>
                <div>
                    <button type="submit" class="form-button">Ajouter Film</button>
                </div>
            </form>


        </div>


    </div>
</body>

</html>