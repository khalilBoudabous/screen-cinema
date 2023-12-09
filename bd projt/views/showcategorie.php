<?php
include "../controller/categoriec.php";
$c = new categoriec();
$tab = $c->listcategorie();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include either Bootstrap 3 or Bootstrap 4, not both -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Include jQuery and Bootstrap JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgydCElv2mRDXO3//WJ2Xqu1Au3V7P5XRTtGJq7bL" crossorigin="anonymous"></script>
    <title>categorie List</title>
</head>

<body>
    <div class="container d-flex align-items-center" style="height: 100vh; font-size: 20px; font-family: 'Roboto Slab';">
        <div class="mx-auto" style="width: 70%;">

            <table class="table table-bordered">
                <label class="text-center">List of categories</label>
                <thead class="thead-dark">
                    <tr>
                        <th>ID categorie</th>
                        <th>Type categorie</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tab as $categorie) { ?>
                        <tr>
                            <td><?= $categorie['id_ca']; ?></td>
                            <td><?= $categorie['type_c']; ?></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Action Buttons">
                                    <form method="POST" action="updatecategorie.php" style="display:inline;">
                                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                                        <input type="hidden" value="<?= $categorie['id_ca']; ?>" name="id_ca">
                                    </form>
                                    <a href="deletecategorie.php?id=<?= $categorie['id_ca']; ?>" class="btn btn-danger">Delete</a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            
            <button class="btn btn-primary" name="addcategorie"><a style="color: white;" href="addcategorie.php">Ajouter categorie</a> </button>

        </div>
    </div>
</body>

</html>
