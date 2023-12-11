<?php
include "../controller/evenementcontroller.php";
include "../controller/sponsorcontroller.php";

$users = null;
$eventc = new evenementcontroller();
$sponsorc = new sponsorcontroller();

$allevents = $eventc->getAllEvents();
if(isset($_GET['tr']))
    {
      $trievent = $eventc->tri();
      $allevents=$trievent;
      

    } else{
        $allevents = $eventc->getAllEvents();

    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Main Css File -->
    <link rel="stylesheet" href="assets/style.css" />
    <!-- BootStrap -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header class="header">

    </header>
    <div class="show-events">
        <table class="table table-bordered ">
            <label class="card card-header">Listes Des Evenements</label>
            <thead class="thead-dark">
                <tr>
                    <th>ID Event</th>
                    <th>Evenement</th>
                    <th>Duree</th>
                    <th>Lieu</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($allevents as $event) {
                  
                    ?>
                    <tr>
                        <td>
                            <?= $event['id_ev']; ?>
                        </td>
                        <td>
                            <?= $event['name']; ?>

                        </td>
                        <td>
                            <?= $event['duree']; ?>
                        </td>
                        <td>
                            <?= $event['placement']; ?>
                        </td>
                        <td>
                            <?= $event['date']; ?>
                        </td>
                        
                       
                        <td style="display: flex;justify-content: center;">

                            <div class="action-buttons">
                                <a href="modifierevenement.php?id=<?= $event['id_ev'] ?>" class="btn btn-secondary" style="text-decoration: none;">Modifier</a>
                                <a href="supprimerevenement.php?id=<?= $event['id_ev'] ?>" class="btn btn-danger" style="text-decoration: none;">Supprimer</a>
                            </div>
                        </td>

                    </tr>
                   
                <?php } ?>
            </tbody>

        </table>
        <div class="metier-buttons">
            <a style="text-decoration: none;align-self:center;" href="addevenement.php">
                <button class="btn btn-dark">Ajouter Evenement</button>
            </a>
            <a style="text-decoration: none;align-self:center;">
            <form methode="POST">
            <form> <input class="btn btn-info" type="submit" name="tr" id="tr" value="Tri"/> </form>

            </form>
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