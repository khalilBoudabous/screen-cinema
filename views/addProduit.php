<?php
session_start();
$Username = isset($_SESSION['Username']) ? $_SESSION['Username'] : '';
?>
<?php
include '../controller/ProduitsC.php';
include '../model/Produit.php';

$Produit = null;
$ProduitsC=null;
if (
   
    isset($_POST['NomP']) && 
    isset($_POST['Prix']) 
) {
    if (
       
        !empty($_POST['NomP']) && 
        !empty($_POST['Prix'])
        ) {
            $ProduitsC= new ProduitsC();

             $Produit = new Produit(NULL,$_POST['NomP'], $_POST['Prix']);
             print_r( $Produit) ;
            // $ProduitsC->addProduit($Produit);
             header('location:listProduits.php');
           } else {
        $error = "Informations manquantes";
    }
}

?>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Offre</title>
    <link rel="stylesheet" href="\ff\Css\chaymatemplate.css">
    
</head>



<body>
    <div style=" width: 100%;
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
<section class="addoffre-section">

            <form style="height: 55vh!important;"  method="POST" class="card-form">
                <h2 style="font-weight: 800;">Ajouter Produit</h2>
                <div class="inputForm">
                    <input type="text" id="NomP" name="NomP" placeholder="Produit" />
                </div>
                <div class="inputForm">
                    <input  id="Prix" name="Prix" placeholder="Prix" />
                </div>
                    <input type="submit" value="Ajouter" />
                
            </form>
    </section>
    </div>
</body>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</html>