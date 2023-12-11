<?php
include '..\Controller\ticketsC.php';
$tickets = new ticketsC();

try{
$tickets->deletetickets($_GET['id_t']);
header('location:listtickets.php');
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
