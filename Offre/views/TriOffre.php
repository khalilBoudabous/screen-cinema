<?php 
     $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	 $bdd = new PDO('mysql:host=localhost;dbname=Offre', 'root', '', $pdo_options);

   // Tri sur colonne

     $tri_autorises = array('IdO','FilmPropose','Duree','TypeP');
     $Offre_by = in_array($_GET['Offre'],$tri_autorises) ? $_GET['Offre'] : 'IdO';

  // Sens du tri

     $Offre_dir = isset($_GET['inverse']) ? 'DESC' : 'ASC';

 //récupère le contenu 

     $result = $bdd->query('SELECT * FROM offre');

// fonction qui affiche les liens

function sort_link($text, $Offre=false)

{
    global $Offre_by, $Offre_dir;
    if(!$Offre)
        $Offre = $text;
    $link = '<a href="?Offre=' . $Offre;
    if($Offre_by==$Offre && $Offre_dir=='ASC')
        $link .= '&inverse=true';
    $link .= '"';
    if($Offre_by==$Offre && $Offre_dir=='ASC')
        $link .= ' class="Offre_asc"';
    elseif($Offre_by==$Offre && $Offre_dir=='DESC')
        $link .= ' class="Offre_desc"';
    $link .= '>' . $text . '</a>';
    return $link;
}

   // Affichage
?>
<table>
    <tr>
        <th><?php echo sort_link('IdO', 'IdO') ?></th>
        <th><?php echo sort_link('FilmPropose', 'FilmPropose') ?></th>
        <th><?php echo sort_link('Duree', 'Duree') ?></th>
        <th><?php echo sort_link('TypeP', 'TypeP') ?></th>
    </tr>
<?php while( $row= $result ->fetch(PDO::FETCH_ASSOC) ) {//le probleme viendrait de cette ligne ?
?> 
    <tr>
        <td><?php echo $row['IdO'] ?></td>
        <td><?php echo $row['FilmPropose'] ?></td>
        <td><?php echo $row['Duree'] ?></td>
        <td><?php echo $row['TypeP'] ?></td>
    </tr>

<?php } ?>

</table>