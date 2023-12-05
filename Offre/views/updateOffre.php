<?php

include '../controller/OffresC.php';
include '../model/Offre.php';
$error = "";

// create Offre
$Offre = null;
// create an instance of the controller
$OffreC = new OffresC();


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
        $Offre = new Offre(
            $_POST['IdO'],
            $_POST['FilmPropose'],
            $_POST['Duree']
    
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
    <title>User Display</title>
</head>

<body>
    <button><a href="listOffres.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['IdO'])) {
        $Offre = $OffreC->showOffre($_POST['IdO']);
        
    ?>

        <form action="" method="POST">
            <table>
            <tr>
                    <td><label for="IdO">IdO:</label></td>
                    <td>
                        <input type="int" id="IdO" name="IdO" value="<?php echo $_POST['IdO'] ?>" readonly />
                        <span id="erreurIdO" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="FilmPropose">FilmPropose:</label></td>
                    <td>
                        <input type="text" id="FilmPropose" name="FilmPropose" value="<?php echo $Offre['FilmPropose'] ?>" />
                        <span id="erreurFilmPropose" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="Duree">Duree :</label></td>
                    <td>
                        <input type="text" id="Duree" name="Duree" value="<?php echo $Offre['Duree'] ?>" />
                        <span id="erreurDuree" style="color: red"></span>
                    </td>
                </tr>
               
                <tr>
                  <td>
                      <input type="submit" value="Update" />
                  </td>
                </tr>
            </table>
        </form>
    <?php
    } else {
        echo "Invalid request.";
    }
    ?>
</body>

</html>