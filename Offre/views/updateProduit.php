<?php

include '../controller/ProduitsC.php';
include '../model/Produits.php';
$error = "";

// create Produit
$Produit = null;
// create an instance of the controller
$ProduitC = new ProduitsC();


if (
    isset($_POST["IdP"]) &&
    isset($_POST["NomP"]) &&
    isset($_POST["Prix"]) 
) {
    if (
        !empty($_POST['IdP']) &&
        !empty($_POST['NomP']) &&
        !empty($_POST["Prix"]) 
    ) {
        $Produit = new Produit(
            $_POST['IdP'],
            $_POST['NomP'],
            $_POST['Prix']
        );
        
        $ProduitC->updateProduit($Produit, $_POST['IdP']);

        header('Location:listProduits.php');
    } else {
        $error = "Missing information";
    }
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="listProduits.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['IdP'])) {
        $Produit = $ProduitC->showProduit($_POST['IdP']);
        
    ?>

        <form action="" method="POST">
            <table>
            <tr>
                    <td><label for="IdP">IdP :</label></td>
                    <td>
                        <input type="int" id="IdP" name="IdP" value="<?php echo $_POST['IdP'] ?>" readonly />
                        <span id="erreurIdP" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="NomP">NomP :</label></td>
                    <td>
                        <input type="text" id="NomP" name="NomP" value="<?php echo $_POST['NomP'] ?>" readonly />
                        <span id="erreurNomP" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="Prix">Prix:</label></td>
                    <td>
                        <input type="text" id="Prix" name="Prix" value="<?php echo $Produit['Prix'] ?>" />
                        <span id="erreurPrix" style="color: red"></span>
                    </td>
                </tr>

                <tr>
                    <td>
                          <input type="submit" value="Update">
                    </td>
                </tr>
            </table>
        </form>
    <?php
    } else {
        echo "Invalid request.";
    }
    ?>
</body>

</html>