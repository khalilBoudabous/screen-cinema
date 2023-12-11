<?php
session_start();
$Username = isset($_SESSION['Username']) ? $_SESSION['Username'] : '';
?>
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
    <link rel="stylesheet" href="\ff\Css\index.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgydCElv2mRDXO3//WJ2Xqu1Au3V7P5XRTtGJq7bL" crossorigin="anonymous"></script>
    <title>categorie List</title>
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
<body>
    <div style=" width: 100%;
    height: 120vh;
    background:url('../image_music/image4.jpg') no-repeat ;
    background-size: cover;
    background-position: center;   ">
        

            <table class="table table-bordered">
                <label class="text-center ">List of categories:</label><style> label{
                    color: white;
                }</style>
                <thead class="background-color: transparent;">
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
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="\ff\js\colorchange.js"></script>

</html>
