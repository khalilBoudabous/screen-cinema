<?php

include '../controller/OffresC.php';
include '../model/Offres.php';

$Offre = Null;
$OffreC = new OffreC();

if (
    isset($_POST["IdO"]) &&
    isset($_POST["FilmPropose"]) &&
    isset($_POST["Duree"]) &&
    isset($_POST["TypeP"])
) {
    if (
        !empty($_POST['IdO']) &&
        !empty($_POST["FilmPropose"]) &&
        !empty($_POST["Duree"]) &&
        !empty($_POST["TypeP"])
    ) {
        $Offre = new Offre(
            null,
            $_POST['IdO'],
            $_POST['FilmPropose'],
            $_POST['Duree'],
            $_POST['TypeP']
        );
        $OffreC->addOffre($Offre);
        header('Location:listOffres.php');
    } else
        $error = "Missing information";
}

// Vérifier si le formulaire a été soumis

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Récupérer les données du formulaire

    $IdO = $_POST["IdO"];
    $FilmPropose = $_POST["FilmPropose"];
    $Duree = $_POST["Duree"];
    $TypeP = $_POST["TypeP"];

    // Enregistrer les données dans la base de données

    $bdd = new PDO("mysql:host=localhost;dbname=mon_site", "root", "");
    $stmt = $bdd->prepare("INSERT INTO reclamations (nom, prenom, email, objet, description) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute(array($IdO, $FilmPropose, $Duree, $TypeP));

    // Afficher un message de confirmation
    
    echo "<p>Votre réclamation a été enregistrée.</p>";
}


?>
<html lang="en">
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de réclamation</title>
    <title>Offre </title>

</head>

<body>
    <a href="listOffres.php">Retour à la liste</a>
    <hr>
    <h1>Formulaire de réclamation</h1>

    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="IdO">IdO :</label></td>
                <td>
                    <input type="int" name="IdO" />
                </td>
            </tr>
            <tr>
                <td><label for="FilmPropose">FilmPropose :</label></td>
                <td>
                    <input type="text"  name="FilmPropose" />
                </td>
            </tr>
            <tr>
                <td><label for="Duree">Duree :</label></td>
                <td>
                    <input type="text" name="Duree" />
                </td>
            </tr>
            <tr>
                <td><label for="TypeP">TypeP :</label></td>
                <td>
                    <input type="text" name="TypeP" />
                </td>
            </tr>

              <td>
                <input type="submit" value="Enregistrer">
              </td>
              <td>
                <input type="reset" value="Annuler">
            </td>
        </table>

    </form>
    <form action="" method="POST">
        <input type="text" name="IdO" placeholder="IdO">
        <input type="text" name="FilmPropose" placeholder="FilmPropose">
        <input type="text" name="Duree" placeholder="Duree">
        <input type="text" name="TypeP" placeholder="TypeP">
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>