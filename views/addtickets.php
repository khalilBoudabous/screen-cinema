<?php
session_start();
$Username = isset($_SESSION['Username']) ? $_SESSION['Username'] : '';
?>
<?php
include '..\Controller\ticketsC.php';
include '..\Model\tickets.php';
$tickets = NULL;
$ticketsC = new ticketsC();

  if (isset($_POST['prix']) && isset($_POST['id_film'])) {
    if (!empty($_POST['prix']) && !empty($_POST['id_film'])) {
      $tickets = new Tickets(null, $_POST['prix'], $_POST['id_film']);
      $ticketsC->addtickets($tickets);
      header('location:listtickets.php');
    } else {
      $error = "Missing information";
    }
  } else {
    $error = "Missing information";
  }
?>
<link rel="stylesheet" href="\ff\Css\index.css">
<html>
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
        <form action="" method="POST">
            <br>Prix: <input type="number" name="prix"></br>
            <br>Id_film: <input type="text" name="id_film"></br>
            <br><input type="submit" value="Save">
            <input type="reset" value="Annuler"></br>
        </form>
        </center>
    </body>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="\ff\js\colorchange.js"></script>
</html>

