<?php
session_start();
$Username = isset($_SESSION['Username']) ? $_SESSION['Username'] : '';
?>
<?php

include '../controller/categoriec.php';
include '../model/categorie.php';
$error = "";

// create client
$categorie = null;
// create an instance of the controller
$categoriec = new categoriec();
if (isset($_POST["type_c"]))
 {
    if (!empty($_POST["type_c"]) )
     {
        foreach ($_POST as $key => $value) 
        {
            echo "Key: $key, Value: $value<br>";
        }
        $categorie = new categorie(
            null,
            $_POST["type_c"]
        );
        $categoriec->updatecategorie($categorie, $_POST['id_ca']);
        header('Location:showcategorie.php');
    } else
        $error = "Missing information";
}
?>



<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\ff\Css\index.css">
    <title>User Display</title>
</head>

<section id="navbar-box">
        <div class="navbar">
            <div class="logo"><a href="#">DREAM SCREEN</a></div>
            <ul class="links">
    
            <li><a href="listsign-up.php">list sign-up</a></li>
            <li><a href="showfilm.php">list film</a></li><li>
            <li><a href="listOffres.php">list Ofeeres</a></li>
            <li><a href="listProduits.php">list Produits</a></li>
            <li><a href="showevents.php">list evenement</a></li>

           
            </ul>
            <p>Welcome: <?php echo $Username; ?><style>p { color: white; }</style>
            <button id="colorToggleBtn" class="action_btn"><ion-icon name="contrast-outline"></ion-icon></button>
            <a href="login.php" class="action_btn" class=>login <span class="icon"><ion-icon name="log-in-outline"></ion-icon></span></a>
            </div>



</section>
<body  style=" width: 100%;
    height: 120vh;
    background:url('../image_music/image4.jpg') no-repeat ;
    background-size: cover;
    background-position: center;   
    color: white;">
    <button><a href="showcategorie.php">Back to list</a></button>
   
    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_ca'])) 
    {
        $categorie = $categoriec->showcategorie($_POST['id_ca']);
        
    ?>

        <form action="" method="POST">
            <table>
            <tr>
                    <td><label for="id_ca">id de categorie :</label></td>
                    <td>
                        <input type="text" id="id_ca" name="id_ca" value="<?php echo $_POST['id_ca'] ?>" readonly />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="type_c">type de film :</label></td>
                    <td>
                        <input type="text" id="type_c" name="type_c" value="<?php echo $categorie['type_c'] ?>" />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </table>

        </form>
    <?php
    }
    ?>
</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="\ff\js\colorchange.js"></script>
</html>