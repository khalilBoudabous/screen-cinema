<?php
session_start();
$Username = isset($_SESSION['Username']) ? $_SESSION['Username'] : '';
?>

<?php
include '../controller/categoriec.php';
include '../model/categorie.php';
$error = "";
$categoriec = null;
$categoriec = new categoriec();

if ( isset($_POST["type_c"]) ) 
{
    
    if (!empty($_POST["type_c"])
    ) {

        $categorie = new categorie(
            null,
            $_POST["type_c"]
        );
        $categoriec->addcategorie($categorie);
        header('Location:showcategorie.php');
    } else
        $error = "Missing information";
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="\ff\Css\addFilm.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="\ff\Css\index.css">
    <title>Ajouter categorie</title>
</head>
<section id="navbar-box">
        <div class="navbar">
            <div class="logo"><a href="#">DREAM SCREEN</a></div>
            <ul class="links">
    
            <li><a href="listsign-up.php">list sign-up</a></li>
            <li><a href="showcategorie.php">list categorie</a></li>
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



    <div class="addFilm-section">
        <div class="card">
            <form action="addcategorie.php" method="POST" class="card-form">
                <div class="input">
                    <label class="input-label">type de film</label>
                    <input type="text" class="input-field" id="type_c" name="type_c" />
                </div>
                <div>
                    <button type="submit" class="form-button">Ajouter Categorie</button>
                </div>
            </form>


        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="\ff\js\colorchange.js"></script>
</body>

</html>