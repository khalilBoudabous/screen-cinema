<?php
session_start();
$Username = isset($_SESSION['Username']) ? $_SESSION['Username'] : '';
?>
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
    <link rel="stylesheet" href="\ff\Css\stylema.css">
    <!-- BootStrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <title>Ajouter playlist</title>
    <link rel="stylesheet" href="\ff\Css\index.css">
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
<body style=" width: 100%;
    height: 120vh;
    background:url('../image_music/image4.jpg') no-repeat ;
    background-size: cover;
    background-position: center;   ">

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
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>