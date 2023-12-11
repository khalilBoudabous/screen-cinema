
<?php
session_start();
$Username = isset($_SESSION['Username']) ? $_SESSION['Username'] : '';
?>
<?php
include "../controller/filmc.php";
include "../controller/categoriec.php";
include "../model/film.php";
$c = new filmc();
$tab = $c->listfilm();
$filmc = new filmc();
$categorieController = new categoriec();



if(isset($_POST['titre_film'])){
$keyword = $_POST['titre_film'];
   $filmcherches = $filmc->rechercherFilm($keyword);
    $tab= $filmcherches;
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include either Bootstrap 3 or Bootstrap 4, not both -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
    <!-- Include jQuery and Bootstrap JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="\ff\Css\index.css">
    <title>Film List pour utilisateur</title>
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
<body style=" width: 100%;
    height: 120vh;
    background:url('../image_music/image4.jpg') no-repeat ;
    background-size: cover;
    background-position: center;   ">
   

        <table class="table  table-bordered">
            <label class="card-header-primary" style="width: 10%;
    background-color: transparent;
    color: white;
    padding: 5px;
    border: 1px solid ;
    border-radius: 5px;">List of films</label>
   <center> <a href="adsign-up.php" class="btn btn-dark mb-3">Add filme</a></center>
    

            <thead style="background-color: transparent;">
                <tr>
                    <th>Titre Film</th>
                    <th>Duree</th>
                    <th>Realisateur</th>
                    <th>Rating</th>
                    <th>Categorie</th>
                    <th>
                        <form method="POST">
                        recherche:
                        <input type="text" name="titre_film" id="titre_film">
                        <input type="submit" name="recherche" value="rechercher" >
                      </form>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tab as $film) { ?>
                    <tr>
                        <td><?= $film['titre_film']; ?></td>
                        <td><?= $film['duree']; ?></td>
                        <td><?= $film['realisateur']; ?></td>
                        <td><?= $film['etoils']; ?></td>

                        <td>
                            <?php
                            $categories = $categorieController->getCategoriesForFilm($film['id_film']);
                            foreach ($categories as $category) {
                                echo '<div class="badge badge-primary mr-2">' . $category['type_c'] . '</div>';
                            }
                            ?>
                        </td>
                        <td>
                           
                        </td>
                    </tr>
                    
                <?php } ?>
               
            </tbody>
        </table>
        <div>
          
    </div>
    <script>
        function redirectToPage(url) 
        {
            window.location.href = url;
        }
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="\ff\js\colorchange.js"></script>
</body>

</html>