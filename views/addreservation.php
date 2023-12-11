<?php
session_start();
$Username = isset($_SESSION['Username']) ? $_SESSION['Username'] : '';
?>
<?php
include '..\Controller\reservationC.php';
include '..\Model\reservation.php';
$error = "";
$reservation = NULL;
$reservationC = new reservationC();
if (isset($_POST['horraires']) && isset($_POST['date']) && isset($_POST['quantite']) && isset($_POST['id_t']) && isset($_POST['methode_p'])) {
    if (!empty($_POST['horraires']) && !empty($_POST['date']) && !empty($_POST['quantite']) && !empty($_POST['id_t']) && !empty($_POST['methode_p'])) {
        $id_r = isset($_POST['id_r']) ? $_POST['id_r'] : null;
        $reservation = new reservation($id_r, $_POST['horraires'], $_POST['date'], $_POST['quantite'], $_POST['id_t'], $_POST['methode_p']);
        $reservationC->addreservation($reservation);
        header('location:listreservation.php');
    } else {
        $error = "Missing information";
    }
} else {
    $error = "Missing information";
}

?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation List |</title>
   
    <link rel="stylesheet" href="\ff\Css\index.css">
</head>
<section id="navbar-box">
        <div class="navbar">
            <div class="logo"><a href="#">DREAM SCREEN</a></div>
            <ul class="links">
    
            <li><a href="listsign-up.php">list sign-up</a></li>
            <li><a href="showfilm.php">list film</a></li><li>
            <li><a href="listOffres.php">list Ofeeres</a></li>
            <li><a href="showevents.php">list evenement</a></li>
            <li><a href="listreservation.php">list reservation</a></li>
            <li><a href="listtickets.php">list tickets</a></li>

           
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
    background-position: center;  
    color: white; ">
    <center>
        <form class="mt-5"  action="" method="POST">
             <input type="time" placeholder="Horraires" name="horraires"><br>
             <input type="date" placeholder="date" name="date"><br>
             <input type="number" placeholder="Quantity" name="quantite"><br>
             <input type="text" placeholder="ID" name="id_t"><br>
             <input type="text" placeholder="Methode" name="methode_p"><br>
            <div style="display:flex">
                <input class="btn btn-primary" type="submit" value="Save"><br>
                <input class="btn btn-danger" type="reset" value="Annuler"><br>
            </div>
        </form>
    </center>
</body>

</html>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="\ff\js\colorchange.js"></script>