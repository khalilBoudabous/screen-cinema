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
    <link rel="stylesheet" href="./Css/addFilm.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <title>Ajouter categorie</title>
</head>

<body>



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


</body>

</html>