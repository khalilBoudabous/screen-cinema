<?php
include '../controller/ProduitsC.php';
include '../model/Produit.php';

$Produit = NULL;
$ProduitsC= new ProduitsC();

if (
    isset($_POST['IdP']) && 
    isset($_POST['NomP']) && 
    isset($_POST['Prix']) 
) {
    if (
        !empty($_POST['IdP']) && 
        !empty($_POST['NomP']) && 
        !empty($_POST['Prix'])
        ) {
             $Produit = new Produit($_POST['IdP'],$_POST['NomP'], $_POST['Prix']);
             $ProduitsC->addProduit($Produit);
             header('location:listProduits.php');
           } else {
        $error = "Informations manquantes";
    }
}

?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produit</title>
</head>
<body>
    <a href="listProduits.php">Retour à la liste</a>
    <hr>

    <form action="" method="POST">
        <table>
            <tr>
                <td>IdP:</td>
                <td><input type="int" name="IdP"></td>
            </tr>
            <tr>
                <td>NomP:</td>
                <td><input type="text" name="NomP"></td>
            </tr>
            <tr>
                <td>Prix:</td>
                <td><input type="float" name="Prix"></td>
            </tr>
                <td>
                    <input type="submit" value="Enregistrer">
                    <input type="reset" value="Annuler">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>