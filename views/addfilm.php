
<?php
session_start();
$Username = isset($_SESSION['Username']) ? $_SESSION['Username'] : '';
?>

<?php
include '../controller/filmc.php';
include '../model/film.php';
include '../controller/categoriec.php';
$error = "";
$filmc = null;
$filmc = new filmc();
$categoriec = null;
$categoriec = new categoriec();

if (
    isset($_POST["titre_film"]) &&
    isset($_POST["duree"]) &&
    isset($_POST["realisateur"]) &&
    isset($_POST["etoils"]) &&
    !empty($_POST["type_c"])
) {

    if (
        !empty($_POST["titre_film"]) &&
        !empty($_POST["duree"]) &&
        !empty($_POST["realisateur"]) &&
        !empty($_POST["etoils"]) &&
        !empty($_POST["type_c"])
    ) {
        $film = new film(
            null,
            $_POST["titre_film"],
            $_POST["duree"],
            $_POST["realisateur"],
            $_POST["etoils"],
            $_POST["type_c"]
        );
        $categorie = new categorie(null, $_POST["type_c"]);
        $filmc->addFilm($film, $categorie);
        header('Location: showfilm.php');
    } else {
        $error = "Missing information";
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="\ff\Css\addFilm.css">
    <link rel="stylesheet" href="\ff\Css\index.css">
    <title>Ajouter Film</title>
</head>
<section id="navbar-box">
        <div class="navbar">
            <div class="logo"><a href="#">DREAM SCREEN</a></div>
            <ul class="links">
    
            <li><a href="listsign-up.php">list sign-up</a></li>
            <li><a href="\ff\views\showcategorie.php">list categorie</a></li>
            <li><a href="showfilm.php">list film</a></li><li>
            <li><a href="listOffres.php">list Ofeeres</a></li>
            <li><a href="showevents.php">list evenement</a></li>
            
            </ul>
            <p>Welcome: <?php echo $Username; ?><style>p { color: white; }</style>
            <button id="colorToggleBtn" class="action_btn"><ion-icon name="contrast-outline"></ion-icon></button>
            <a href="login.php" class="action_btn" class=>login <span class="icon"><ion-icon name="log-in-outline"></ion-icon></span></a>
            </div>
</section>
<center>
<body style=" width: 100%;
    height: 120vh;
    background:url('../image_music/image4.jpg') no-repeat ;
    background-size: cover;
    background-position: center;   ">

    <div class="addFilm-section">
        <div class="card">

            <form action="addfilm.php" method="POST" class="card-form">
                <div class="input">
                    <label class="input-label">Titre du Film</label>
                    <input type="text" class="input-field" id="titre_film" name="titre_film" />

                </div>
                <div class="input">
                    <label class="input-label">Durée</label>
                    <input type="text" class="input-field" id="duree" name="duree" />

                </div>
                <div class="input">
                    <label class="input-label">Directeur</label>
                    <input type="text" class="input-field" id="realisateur" name="realisateur" />

                </div>


                <div class="input">
                    <label class="input-label">Rating</label>
                    <input type="text" class="input-field" id="etoils" name="etoils" />

                </div>
                    <select name="type_c" id="type_c">
                        <option value="drama">drama</option>
                        <option value="aventure">aventure</option>
                        <option value="action">action</option>
                    </select>
                <div>
                    <button type="submit" class="form-button">Ajouter Film</button>
                </div>
            </form>


        </div>


    </div>
    
</body>
</center>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="\ff\js\colorchange.js"></script>
</html>