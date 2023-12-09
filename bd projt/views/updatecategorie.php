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
    <title>User Display</title>
</head>


<body style="background-color: gray;">
    <button><a href="showcategorie.php">Back to list</a></button>
    <hr>

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

</html>