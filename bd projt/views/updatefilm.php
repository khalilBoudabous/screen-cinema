<?php

include '../controller/filmc.php';
include '../model/film.php';
$error = "";

// create client
$film = null;
// create an instance of the controller
$filmc = new filmc();


if (
    isset($_POST["titre_film"]) &&
    isset($_POST["duree"]) &&
    isset($_POST["realisateur"]) &&
    isset($_POST["etoils"])
) {
    if (
        !empty($_POST["titre_film"]) &&
        !empty($_POST["duree"]) &&
        !empty($_POST["realisateur"]) &&
        !empty($_POST["etoils"])
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $film = new film(
            null,
            $_POST["titre_film"],
            $_POST["duree"],
            $_POST["realisateur"],
            $_POST["etoils"]
        );
        var_dump($film);
        $filmc->updatefilm($film, $_POST['id_film']);
        header('Location:showfilm.php');
    } else
        $error = "Missing information";
}



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
<body style="background-color: gray;">
    <button><a href="showfilm.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_film'])) {
        $film = $filmc->showfilm($_POST['id_film']);
        
    ?>

        <form action="" method="POST">
            <table>
            <tr>
                    <td><label for="id_film">id_film :</label></td>
                    <td>
                        <input type="text" id="id_film" name="id_film" value="<?php echo $_POST['id_film'] ?>" readonly />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="titre_film">titre_film :</label></td>
                    <td>
                        <input type="text" id="titre_film" name="titre_film" value="<?php echo $film['titre_film'] ?>" />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="duree">duree :</label></td>
                    <td>
                        <input type="text" id="duree" name="duree" value="<?php echo $film['duree'] ?>" />
                        <span id="erreurduree" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="realisateur">realisateur :</label></td>
                    <td>
                        <input type="text" id="realisateur" name="realisateur" value="<?php echo $film['realisateur'] ?>" />
                        <span id="erreurrealisateur" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="etoils">etoils :</label></td>
                    <td>
                        <input type="text" id="etoils" name="etoils" value="<?php echo $film['etoils'] ?>" />
                        <span id="erreuretoils" style="color: red"></span>
                    </td>
                </tr>
                

                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </table>

        </form>
    <?php
    }
    ?>
</body>

</html>