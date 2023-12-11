<?php
session_start();
$Username = isset($_SESSION['Username']) ? $_SESSION['Username'] : '';
?>
<?php
include "../controller/OffresC.php";

$c = new OffresC();
$Offre_by=null;
$Offre_dir=null;
$tab = $c-> listOffres($Offre_by, $Offre_dir);

?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\ff\Css\chaymatemplate.css">
    
</head>

<body style=" width: 100%;
    height: 120vh;
    background:url('../image_music/image4.jpg') no-repeat ;
    background-size: cover;
    background-position: center;   ">
    
<header>
<nav>
<section id="navbar-box">
        <div class="navbar">
            <div class="logo"><a href="#">DREAM SCREEN</a></div>
            <ul class="links">
    
            <li><a href="listsign-up.php">list sign-up</a></li>
            <li><a href="showfilm.php">list film</a></li><li>
            <li><a href="listOffres.php">list Ofeeres</a></li>
            <li><a href="listProduits.php">list Produits</a></li>
            <li><a href="showevents.php">list evenement</a></li>

           
            </ul>
            <p>Welcome: <?php echo $Username; ?><style>p { color: white; }</style>
            <button id="colorToggleBtn" class="action_btn"><ion-icon name="contrast-outline"></ion-icon></button>
            <a href="login.php" class="action_btn" class=>login <span class="icon"><ion-icon name="log-in-outline"></ion-icon></span></a>
            </div>



</section>
    </nav>
</header>
    <section  class="list-offre-page">
    <h1 style="color:white;">Liste d'Offres</h1>
     
<table class="table table-bordered" style="color:white;width:70%;background: radial-gradient( circle, rgba(108, 11, 11, 1) 0%, rgba(0, 0, 0, 1) 100% );">
    <tr>
        <th>IdO</th>
        <th>FilmPropose</th>
        <th>Duree</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    <tr>
         <?php
             foreach ($tab as $Offre) {
                ?>
                <td><?= $Offre['IdO']; ?> </td>
                <td><?= $Offre['FilmPropose']; ?> </td>
                <td><?= $Offre['Duree']; ?> </td>
                
                <td>
                     <form method="POST" action="updateOffre.php">
                         <input type="submit" name="update" value="Update">
                         <input type="hidden" value=<?PHP echo $Offre['IdO']; ?> name="IdO">
                     </form>
                </td>
                <td>
                      <a href="deleteOffre.php?IdO=<?php echo $Offre['IdO']; ?>">Delete</a>
                </td>
    </tr>
    <?php
    }
    ?>
</table>
<a href="addOffre.php"> Ajouter un Offre</a>
</section>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


