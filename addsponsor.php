<?php
include "../controller/sponsorcontroller.php";
include "../model/sponsor.php";
$sponsor = null;
$sponsorc = null;
$sponsorc = new sponsorcontroller();
if (
    isset($_POST['name']) &&
    isset($_POST['phone']) &&
    isset($_POST['montant']) 
) if (
    !empty($_POST['name']) &&
    !empty($_POST['phone']) &&
    !empty($_POST['montant']) 
) {
    $sponsor = new sponsor(null, $_POST['name'], $_POST['phone'], $_POST['montant']);
    $sponsorc->addsponsor($sponsor);
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
                <h2 style="font-weight: 800;">Ajouter Sponsor</h2>
                <div class="inputForm">
                    <input type="text" id="name" name="name" placeholder="Name" />
                </div>
                <div class="inputForm">
                    <input type="text" id="phone" name="phone" placeholder="Phone" />
                </div>
                <div class="inputForm">
                    <input type="text" id="montant" name="montant" placeholder="montant" />
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