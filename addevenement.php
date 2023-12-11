<?php
include "../controller/evenementcontroller.php";
include "../model/evenement.php";
$evenement = null;
$eventc = null;
$eventc = new evenementcontroller();
if (
    isset($_POST['name']) &&
    isset($_POST['duree']) &&
    isset($_POST['placement']) &&
    isset($_POST['date'])
) if (
    !empty($_POST['name']) &&
    !empty($_POST['duree']) &&
    !empty($_POST['placement'])  &&
    !empty($_POST['date'])
) {
    $evenement = new evenement(null, $_POST['name'], $_POST['placement'], $_POST['duree'], $_POST['date']);
    $eventc->addevenement($evenement);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Main File css -->
    <link rel="stylesheet" href="assets/style.css">
    <!-- BootStrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <title>Ajouter playlist</title>
</head>

<body>

    <section class="addevenement-section">
        <div class="color"> </div>
        <div class="color"> </div>
        <div class="color"> </div>
        <div class="boxes">
            <div class="carre" style="--i:0;"></div>
            <div class="carre" style="--i:1;"></div>
            <div class="carre" style="--i:2;"></div>
            <div class="carre" style="--i:3;"></div>
            <div class="carre" style="--i:4;"></div>

        </div>
        <div class="form-container">

            <form action="" method="POST" class="card-form">
                <h2 style="font-weight: 800;">Créer Votre Evenement</h2>
                <div class="inputForm">
                    <input type="text" id="name" name="name" placeholder="Name" />
                </div>
                <div class="inputForm">
                    <input type="number" id="duree" name="duree" placeholder="Durée" />
                </div>
                <div class="inputForm">
                    <input type="text" id="placement" name="placement" placeholder="Lieu" />
                </div>
                <div class="inputForm" style="width: 75%;">
                    <input type="text" id="date" name="date" placeholder="Date" />
                </div>
                <div class="inputForm">
                    <input type="submit" value="Ajouter" />
                </div>
        </div>
        </form>
        </div>
    </section>


</body>

</html>