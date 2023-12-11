<?php
session_start();
$Username = isset($_SESSION['Username']) ? $_SESSION['Username'] : '';
?>
<?php
include "../controller/sponsorcontroller.php";
include "../controller/evenementcontroller.php";

include "../model/sponsor.php";
$sponsor = null;
$sponsorc = new sponsorcontroller();
$eventc =  new evenementcontroller();
$id_ev = $_GET['id'];
if (isset($id_ev)) {
    $evenement = $eventc->getEvent($id_ev);
}
if (
    isset($_POST['name']) &&
    isset($_POST['phone']) &&
    isset($_POST['montant'])
) if (
    !empty($_POST['name']) &&
    !empty($_POST['phone']) &&
    !empty($_POST['montant'])  
) {
    $newsponsor = new sponsor(null, $_POST['name'], $_POST['phone'], $_POST['montant']);

    $sponsorc->affectsponsortoevent($newsponsor, $id_ev);
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
<section id="navbar-box">
        <div class="navbar">
            <div class="logo"><a href="#">DREAM SCREEN</a></div>
            <ul class="links">
    
            <li><a href="listsign-up.php">list sign-up</a></li>
            <li><a href="showfilm.php">list film</a></li><li>
            <li><a href="listOffres.php">list Ofeeres</a></li>
            <li><a href="showsponsors.php">list sponsors</a></li>
            <li><a href="showevents.php">list evenement</a></li>
            
            </ul>
            <p>Welcome: <?php echo $Username; ?><style>p { color: white; }</style>
            <button id="colorToggleBtn" class="action_btn"><ion-icon name="contrast-outline"></ion-icon></button>
            <a href="login.php" class="action_btn" class=>login <span class="icon"><ion-icon name="log-in-outline"></ion-icon></span></a>
            </div>
</section>
<body>

    <section class="addevenement-section">
        <div class="form-container">

            <form action="" method="POST" class="card-form">
                <h2 style="font-weight: 800;text-align: center;">Ajouter Sponsor à l'Evenement</h2>
                <div class="inputForm">
                <input type="text" id="name" name="name" placeholder="Name" value="<?php echo $evenement['Name']; ?>" />

                </div>

                <div class="inputForm">
                    <label>Nom</label>

                    <input type="text" id="name" name="name" placeholder="Name"  />
                </div>
                <div class="inputForm">
                    <label>Phone</label>

                    <input type="text" id="phone" name="phone" placeholder="Phone" />
                </div>
                <div class="inputForm">
                    <label>Montant</label>
                    <input type="text" id="montant" name="montant" placeholder="montant"  />
                </div>

                <div class="inputForm">
                    <input type="submit" value="Modifier" />
                </div>
        </div>
        </form>
        </div>
    </section>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>