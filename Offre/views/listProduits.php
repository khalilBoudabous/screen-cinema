<?php
include "../controller/ProduitsC.php";

$c = new ProduitsC();
$tab = $c->listProduits();

?>

<center>
    <h1>Liste de Produit</h1>
    <a href="addProduit.php"> Ajouter un Produit</a>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>IdP</th>
        <th>NomP</th>
        <th>Prix</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    <tr>
         <?php foreach ($tab as $Produit) 
        {
                ?>
                <td><?= $Produit['IdP']; ?></td>
                <td><?= $Produit['NomP']; ?></td>
                <td><?= $Produit['Prix']; ?></td>
                <td align="center">
                       <form method="POST" action="updateProduit.php">
                            <input type="submit" name="update" value="Update">
                            <input type="hidden" value=<?PHP echo $Produit['IdP']; ?> name="IdP">
                       </form>
                </td>
                <td>
                    <a href="deleteProduit.php?IdP=<?php echo $Produit['IdP']; ?>">Delete</a>
                </td>
    </tr>
    <?php
    }
    ?>
</table>