<?php
include "../controller/OffresC.php";

$c = new OffresC();
$Offre_by = null;
$Offre_dir = null;
$tab = $c->listOffres($Offre_by, $Offre_dir);

?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="newtemplate.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
</head>

<body>

    <header>
        <nav>
            <section id="navbar-box">
                <div class="navbar">
                    <div class="logo"><a style="text-decoration: none;color:white;" href="#">DREAM SCREEN</a></div>
                    <tr>
                        <ul class="links">
                            <th>
                                <li><a style="text-decoration: none;color:white;" href="C:\Users\khllb\Desktop\New folder (2)\about\about.html">home</a></li>
                            </th>
                            <th>
                                <li><a style="text-decoration: none;color:white;" href="#">About</a></li>
                            </th>
                            <th>
                                <li><a style="text-decoration: none;color:white;" href="#">Program Today</a></li>
                            </th>
                            <th>
                                <li><a style="text-decoration: none;color:white;" href="#">Buy a ticket</a></li>
                            </th>
                            <th>
                                <li><a style="text-decoration: none;color:white;" href="#">offre</a></li>
                            </th>
                            <th>
                                <li><a style="text-decoration: none;color:white;" href="#">event</a></li>
                            </th>
                        </ul>
                        <a href="\Users\khllb\Desktop\login page\" class="action_btn">login </a><span class="icon"><ion-icon name="log-in-outline"></ion-icon></span>
                    </tr>
                </div>
            </section>
        </nav>
    </header>
    <section id="sing-up" class="sing-up" style="border-radius:15px;">
        <h1 style="color:white;">Liste d'Offres</h1>

        <table class="table table-bordered" style="color:white;width:70%;background: radial-gradient( circle, rgba(108, 11, 11, 1) 0%, rgba(0, 0, 0, 1) 100% );
">
            <tr>
                <th>IdO</th>
                <th>FilmPropose</th>
                <th>Duree</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <tr>
                <?php
                foreach ($tab as $Offre) {
                ?>
                    <td><?= $Offre['IdO']; ?> </td>
                    <td><?= $Offre['FilmPropose']; ?> </td>
                    <td><?= $Offre['Duree']; ?> </td>

                    <td>
                        <form method="POST" action="updateOffre.php">

                            <input type="submit" name="update" value="Update">
                            <input type="hidden" value=<?PHP echo $Offre['IdO']; ?> name="IdO">
                        </form>
                    </td>
                    <td>
                        <a href="deleteOffre.php?IdO=<?php echo $Offre['IdO']; ?>">Delete</a>
                    </td>
            </tr>
        <?php
                }
        ?>
        </table>
        <a href="addOffre.php"> Ajouter un Offre</a>
    </section>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>