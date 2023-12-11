<?php 
include 'C:\xampp\htdocs\Offre\Offre\Offre\controller\OffresC.php';
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host=localhost;dbname=offre', 'root', '', $pdo_options);

// Création de la table 'Offre' si elle n'existe pas déjà
$bdd->exec("CREATE TABLE IF NOT EXISTS Offre (
    IdO INT PRIMARY KEY AUTO_INCREMENT,
    FilmPropose VARCHAR(255),
    Duree INT,
    TypeP VARCHAR(255)
)");

// Tri sur colonne
$tri_autorises = array('IdO', 'FilmPropose', 'Duree', 'TypeP');
$Offre_by = isset($_GET['FilmPropose']) && in_array($_GET['FilmPropose'], $tri_autorises) ? $_GET['FilmPropose'] : 'IdO';

// Sens du tri
$Offre_dir = isset($_GET['inverse']) ? 'DESC' : 'ASC';

// récupère le contenu
$result = $bdd->query('SELECT * FROM Offre');

// fonction qui affiche les liens
function sort_link($text, $Offre = false)
{
    global $Offre_by, $Offre_dir;
    if (!$Offre)
        $Offre = $text;
    $link = '<a href="?FilmPropose=' . $Offre;
    if ($Offre_by == $Offre && $Offre_dir == 'ASC')
        $link .= '&inverse=true';
    $link .= '"';
    if ($Offre_by == $Offre && $Offre_dir == 'ASC')
        $link .= ' class="Offre_asc"';
    elseif ($Offre_by == $Offre && $Offre_dir == 'DESC')
        $link .= ' class="Offre_desc"';
    $link .= '>' . $text . '</a>';
    return $link;
}

// Affichage
?>
<style>
    .Offre_asc:after {
        content: ' ▲'; /* Flèche vers le haut */
    }

    .Offre_desc:after {
        content: ' ▼'; /* Flèche vers le bas */
    }
</style>
<?php
$Offre_by = isset($_GET['FilmPropose']) ? $_GET['FilmPropose'] : 'IdO';
$Offre_dir = isset($_GET['inverse']) ? 'DESC' : 'ASC';

$OffresC = new OffresC();
$offres = $OffresC->listOffres($Offre_by, $Offre_dir);
?>

<table>
    <tr>
        <th><?php echo sort_link('IdO', 'IdO') ?></th>
        <th><?php echo sort_link('FilmPropose', 'FilmPropose') ?></th>
        <th><?php echo sort_link('Duree', 'Duree') ?></th>
    </tr>
    <?php foreach ($offres as $offre) { ?>
        <tr>
            <td><?php echo $offre['IdO'] ?></td>
            <td><?php echo $offre['FilmPropose'] ?></td>
            <td><?php echo $offre['Duree'] ?></td>
        </tr>
    <?php } ?>
</table>
