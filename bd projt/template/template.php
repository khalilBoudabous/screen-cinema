<?php
include "../controller/filmc.php";
include "../controller/categoriec.php";
include "../model/film.php";
$c = new filmc();

$filmc = new filmc();
$categorieController = new categoriec();
$tab = $c->listfilm();





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="template.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>

    <title>Landing Page</title>
</head>

<body>
    <main class="main-film">
        <section class="navbar-box">
            <div class="navbar">
                <div class="logo"><a href="#">DREAM SCREEN</a></div>
                <ul class="links">

                    <li><a href="../views/showultisateur.php">home</a></li>
                    <li><a href="\ff\about\about.html">About</a></li>
                    <li><a href="#">Program Today</a></li>
                    <li><a href="#">Buy a ticket</a></li>
                    <li><a href="#">offre</a></li>
                    <li><a href="#">event</a></li>
                </ul>
                <a id="colorToggleBtn" class="action_btn"><span class="icon"><ion-icon name="contrast-outline"></ion-icon></span></a>
                <a href="\ff\login page\login.php" class="action_btn">login <span class="icon"><ion-icon name="log-in-outline"></ion-icon></span></a>
            </div>
        </section>
        <section class="films-list">
            <h3>FILMS</h3>
                <div>
                        <form method="POST">
                        <input type="text" name="titre_film" id="titre_film">
                        <input type="submit" name="recherche" value="rechercher" style="color: Maroon;">
                        </form>
                </div>
            <div class="list">
                <?php foreach ($tab as $film) { ?>
                    <div class="card-film">
                        <div class="cover">
                            <img src="image4.jpg" alt="cover" />
                        </div>
                        <div class="card-film-content">
                            <h6 style="color: Maroon;">Titre :  </h6><h6><?= $film['titre_film']; ?></h6>
                            <h6 style="color: Maroon;">Realisateur :  </h6><h6><?= $film['realisateur']; ?></h6>
                            <h6 style="color: Maroon;">Duree :  </h6><h6><?= $film['duree']; ?></h6>
                            <h6 style="color: Maroon;">categorie : </h6><h6><?php
                            $categories = $categorieController->getCategoriesForFilm($film['id_film']);
                            foreach ($categories as $category)
                            {
                                echo '<div class="badge badge-primary mr-2">' . $category['type_c'] . '</div>';
                            }
                            ?></h6>
                            <h6 style="color: Maroon;">grade :  </h6><h6><?= $film['etoils']; ?></h6>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>

</body>

</html>