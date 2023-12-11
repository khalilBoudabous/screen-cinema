
<?php
include "../controller/filmc.php";
include "../controller/categoriec.php";
include "../model/film.php";
$c = new filmc();
$tab = [];
$filmc = new filmc();
$categorieController = new categoriec();
$tab = $c->listfilm();
$keyword = null;

session_start();
$Username = isset($_SESSION['Username']) ? $_SESSION['Username'] : '';
if (isset($_POST['titre_film'])) {


    $keyword = $_POST['titre_film'];
    $filmcherches = $filmc->rechercherFilm($keyword);
    $tab = $filmcherches;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\ff\Css\newtemplate.css">
    <link rel="stylesheet" href="\ff\Css\style3.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>

    <!-- Particles JS -->
    <script src="app.js"></script>
    <script src="particles.js"></script>
    <title>Landing Page</title>
</head>

<body class="section-template">
    <main class="main-film">

        <section class="navbar-box">
            <div class="navbar">
                <div class="logo"><a href="#">DREAM SCREEN</a></div>
                <ul class="links">

                    <li><a href="template.php">home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="Testing.php">Buy a ticket</a></li>
                    <li><a href="frontoffres.php">offre</a></li>
                    <li><a href="#">event</a></li>
                </ul>
                <p>Welcome: <?php echo $Username; ?><style>p { color: white; }</style>
                </p>
                <a href="adsign-up.php">dec</a>
                <a id="colorToggleBtn" class="action_btn"><span class="icon"><ion-icon name="contrast-outline"></ion-icon></span></a>
                <a href="login.php" class="action_btn">login <span class="icon"><ion-icon name="log-in-outline"></ion-icon></span></a>
            </div>
        </section>
        <section class="films-list">

            <div class="films-list-header">
                <h3>FILMS:</h3>
                <div>
                    <form class="search-film-form" method="POST">
                        <input type="text" name="titre_film" id="titre_film">
                        <button type="submit" name="recherche" style="border:none;outline:none;padding:10px;cursor:pointer;">
                            Recherche
                        </button>
                    </form>
                </div>
            </div>

            <div class="list">
                <?php foreach ($tab as $film) { ?>
                    <div class="card-film">
                        <div class="cover">
                            
                            <img src="\ff\image_music\4.PNG" alt="Film Image"  />
                        </div>
                        <div class="card-film-content">
                            <h5 style="color: Maroon;"> </h5>
                            <h3><?= $film['titre_film']; ?></h3>
                            <h5 style="color: Maroon;">Realisateur : </h5>
                            <h5><?= $film['realisateur']; ?></h5>
                            <h5 style="color: Maroon;">Duree : </h5>
                            <h5><?= $film['duree']; ?></h5>
                            <h5 style="color: Maroon;">categorie : </h5><h5><?php
                            $categories = $categorieController->getCategoriesForFilm($film['id_film']);
                            foreach ($categories as $category)
                            {
                                echo '<div class="badge badge-primary mr-2">' . $category['type_c'] . '</div>';
                            }
                            ?></h5>
                            <h5 style="color: Maroon;">grade : </h5>
                            <h5><?= $film['etoils']; ?></h5>
                        </div>
                    </div>
                <?php } ?>

        </section>
        <footer style="height:15vh;">
            <div id="particles-js"></div>
        </footer>
    </main>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    

</body>
<audio autoplay loop>
    <source src="\ff\music.mp3" type="audio/mp3">

</audio>

<script type="text/javascript" src="\js\app.js"></script>
<script type="text/javascript" src="\js\particles.js"></script>
<script src="\ff\colorchange.js"></script>



</html>