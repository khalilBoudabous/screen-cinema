<?php
include "../controller/OffresC.php";

$c = new OffresC();
$tab = $c->listOffres();

?>

<center>
    <h1>Liste d'Offres</h1>
    <h2>
        <a href="addOffre.php"> Ajouter un Offre</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
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
                
                <td align="center">
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