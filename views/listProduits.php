<?php
session_start();
$Username = isset($_SESSION['Username']) ? $_SESSION['Username'] : '';
?>
<?php
include "../controller/ProduitsC.php";

$c = new ProduitsC();
$tab = $c->listProduits();

?>

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
    <section id="sing-up" class="sing-up">

    <h1 style="color:white;">Liste de Produit</h1>
    <table class="table table-bordered" style="color:white;width:70%;background: radial-gradient( circle, rgba(108, 11, 11, 1) 0%, rgba(0, 0, 0, 1) 100% );">
    <tr>
        <th>IdP</th>
        <th>Produit</th>
        <th>Prix</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    <tr>
         <?php foreach ($tab as $Produit) 
        {
                ?>
                <td><?= $Produit['IdP']; ?></td>
                <td><?= $Produit['NomP']; ?></td>
                <td><?= $Produit['Prix']; ?></td>
                <td>
                       <form method="POST" action="updateProduit.php">
                            <input type="submit" name="update" value="Update">
                            <input type="hidden" value=<?PHP echo $Produit['IdP']; ?> name="IdP">
                       </form>
                </td>
                <td>
                    <a href="deleteProduit.php?IdP=<?php echo $Produit['IdP']; ?>">Delete</a>
                </td>
    </tr>
    <?php
    }
    ?>
</table>
<a href="addProduit.php"> Ajouter un Produit</a>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</section>
</body>

