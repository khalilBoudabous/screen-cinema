<?php 
     $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	 $bdd = new PDO('mysql:host=localhost;dbname=stats', 'root', '', $pdo_options);

   // Tri sur colonne

     $tri_autorises = array('IdO','FilmPropose','Duree','TypeP');
     $order_by = in_array($_GET['order'],$tri_autorises) ? $_GET['order'] : 'IdO';

  // Sens du tri

     $order_dir = isset($_GET['inverse']) ? 'DESC' : 'ASC';

 //récupère le contenu 

     $result = $bdd->query('SELECT * FROM Offre');

// fonction qui affiche les liens

function sort_link($text, $order=false)

{
    global $order_by, $order_dir;
    if(!$order)
        $order = $text;
    $link = '<a href="?order=' . $order;
    if($order_by==$order && $order_dir=='ASC')
        $link .= '&inverse=true';
    $link .= '"';
    if($order_by==$order && $order_dir=='ASC')
        $link .= ' class="order_asc"';
    elseif($order_by==$order && $order_dir=='DESC')
        $link .= ' class="order_desc"';
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
<?php while( $row=fetch_assoc($result) )  //le probleme viendrait de cette ligne ?
?> 
    <tr>
        <td><?php echo $row['ID'] ?></td>
        <td><?php echo $row['FilmPropose'] ?></td>
        <td><?php echo $row['Duree'] ?></td>
        <td><?php echo $row['TypeP'] ?></td>
    </tr>

<?php endwhile ?>

</table>