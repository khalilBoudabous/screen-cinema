<?php
include "../controller/evenementcontroller.php";
include "../model/evenement.php";
$evenement = null;
$eventc = new evenementcontroller();

$id_ev = $_GET['id'];
if (isset($id_ev)) {
    $evenement = $eventc->getEvent($id_ev);
}
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
    $newevenement = new evenement(null, $_POST['name'], $_POST['placement'], $_POST['duree'], $_POST['date']);

    $eventc->modifierevenement($newevenement, $id_ev);
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
                <h2 style="font-weight: 800;">Modifier Votre Evenement</h2>
                <div class="inputForm">
                <input type="text" id="name" name="name" placeholder="Name" value="<?php echo $evenement['name']; ?>" />
                </div>
                <div class="inputForm">
                    <input type="number" id="duree" name="duree" placeholder="Durée" value="<?php echo $evenement['duree']; ?>" />
                </div>
                <div class="inputForm">
                    <input type="text" id="placement" name="placement" placeholder="Lieu" value="<?php echo $evenement['placement'] ?>" />
                </div>
                <div class="inputForm" style="width: 75%;">
                    <input type="text" id="date" name="date" placeholder="Date" value="<?php echo $evenement['date'] ?>" />
                </div>
                <div class="inputForm">
                    <input type="submit" value="Modifier" />
                </div>
        </div>
        </form>
        </div>
    </section>


</body>

</html>