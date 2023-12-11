<?php
session_start();
$Username = isset($_SESSION['Username']) ? $_SESSION['Username'] : '';
?>
<?php
include "../controller/sponsorcontroller.php";
include "../controller/evenementcontroller.php";

$users = null;
$sponsorc = new sponsorcontroller();
$eventc = new evenementcontroller();
$allevents = null;
$allsponsors = $sponsorc->getAllSponsors();
if(isset($_GET['tr']))
    {
      $trisponsor = $sponsorc->tri();
      $allsponsors=$trisponsor;
      

    } else{
        $allsponsors = $sponsorc->getAllSponsors();

    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Main Css File -->
    <link rel="stylesheet" href="\ff\Css\stylema.css" />
    <!-- BootStrap -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="\ff\Css\index.css" />
</head>
<section id="navbar-box">
        <div class="navbar">
            <div class="logo"><a href="#">DREAM SCREEN</a></div>
            <ul class="links">
    
            <li><a href="listsign-up.php">list sign-up</a></li>
            <li><a href="showfilm.php">list film</a></li><li>
            <li><a href="listOffres.php">list Ofeeres</a></li>
            <li><a href="showsponsors.php">list sponsors</a></li>
            <li><a href="showevents.php">list evenement</a></li>
           
            </ul>
            <p>Welcome: <?php echo $Username; ?><style>p { color: white; }</style>
            <button id="colorToggleBtn" class="action_btn"><ion-icon name="contrast-outline"></ion-icon></button>
            <a href="login.php" class="action_btn" class=>login <span class="icon"><ion-icon name="log-in-outline"></ion-icon></span></a>
            </div>



</section>
<body>
    <header class="header">

    </header>
    <div class="show-events" style=" width: 100%;
    height: 120vh;
    background:url('../image_music/image4.jpg') no-repeat ;
    background-size: cover;
    background-position: center;   ">
        <table class="table table-bordered ">
            <label class="card card-header">Listes Des Sponsors</label>
            <thead class="thead-dark">
                <tr>
                    <th>ID </th>
                    <th>Sponsor</th>
                    <th>Phone</th>
                    <th>Montant</th>

                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($allsponsors as $sponsor) {
                   
                    ?>
                    
                   
                    <tr>
                        <td>
                            <?= $sponsor['id_sp']; ?>
                        </td>
                        <td>
                            <?= $sponsor['name']; ?>

                        </td>
                        <td>
                            <?= $sponsor['phone']; ?>
                        </td>
                        <td>
                            <?= $sponsor['montant']; ?>
                        </td>
                       

                        <td style="display: flex;justify-content: center;">

                            <div class="action-buttons">
                                <a href="modifysponsor.php?id=<?= $sponsor['id_sp'] ?>" class="btn btn-secondary" style="text-decoration: none;">Modifier</a>
                                <a href="supprimersponsor.php?id=<?= $sponsor['id_sp'] ?>" class="btn btn-danger" style="text-decoration: none;">Supprimer</a>

                            </div>
                        </td>

                    </tr>
                   
                <?php } ?>
            </tbody>

        </table>
        <div class="metier-buttons">
            <a style="text-decoration: none;align-self:center;" href="addsponsor.php">
                <button class="btn btn-dark">Ajouter Sponsor</button>
            </a>
            <a style="text-decoration: none;align-self:center;">
                <button class="btn btn-secondary">Trier Sponsors</button>
            </a>
        </div>
    </div>
</body>
<!-- =================================JS============================================ -->

<!-- Modernizer JS -->
<script src="../assets/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="../assets/js/plugins/app.js"></script>
<!-- Particles JS -->
<script src="../assets/js/plugins/particles.js"></script>
<script src="../assets/js/plugins/app.js"></script>

<!-- jQuery JS -->
<script src="../assets/js/vendor/jquery-3.3.1.min.js"></script>

<!-- Bootstrap JS -->
<script src="../assets/js/vendor/bootstrap.min.js"></script>
<!-- Slick Slider JS -->
<script src="../assets/js/plugins/slick.min.js"></script>
<!-- nice select JS -->
<script src="../assets/js/plugins/nice-select.min.js"></script>
<!-- audio video player JS -->
<script src="../assets/js/plugins/plyr.min.js"></script>
<!-- perfect scrollbar js -->
<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
<!-- light gallery js -->
<script src="../assets/js/plugins/lightgallery-all.min.js"></script>
<!-- image loaded js -->
<script src="../assets/js/plugins/imagesloaded.pkgd.min.js"></script>
<!-- isotope filter js -->
<script src="../assets/js/plugins/isotope.pkgd.min.js"></script>
<!-- Main JS -->
<script src="../assets/js/main.js"></script>

</html>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>