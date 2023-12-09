<?php
include "../controller/filmc.php";
include "../controller/categoriec.php";
include "../model/film.php";
$c = new filmc();
$tab = $c->listfilm();
$categorieController = new categoriec();

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
    <title>Film List</title>
</head>
<body style="background-color: antiquewhite">
    <div class="container d-flex justify-content-center" style="height: 100vh; font-size: 20px; font-family: 'Roboto Slab';gap:5px;flex-direction:column;">


        <table class="table  table-bordered" id="datatableid">
            <label class="card-header-primary" style="width: 10%;
    background: cornflowerblue;
    padding: 5px;
    border: 1px solid cornflowerblue;
    border-radius: 5px;">List of films</label>
            <thead style="background: cornflowerblue;">
                <tr>
                    <th>ID Film</th>
                    <th>Titre Film</th>
                    <th>Duree</th>
                    <th>Realisateur</th>
                    <th>Rating</th>
                    <th>Categorie</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tab as $film) { ?>
                    <tr>
                        <td><?= $film['id_film']; ?></td>
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
                            <div class="btn-group" style="gap: 10px;" role="group" aria-label="Action Buttons">
                                <form method="POST" action="updatefilm.php" style="display:inline;">
                                    <button type="submit" class="btn btn-primary" name="update">Update</button>
                                    <input type="hidden" value="<?= $film['id_film']; ?>" name="id_film">
                                </form>
                                <a href="deletefilm.php?id=<?= $film['id_film']; ?>" class="btn btn-danger">Delete</a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <button style="display: flex;justify-content: center;align-items: center;align-self: center;" class="btn btn-primary" name="addFilm" onclick="redirectToPage('addfilm.php')">Ajouter Film</button>


    </div>
    <script>
        function redirectToPage(url) 
        {
            window.location.href = url;
        }
    </script>
</body>

</html>