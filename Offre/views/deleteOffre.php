<?php
include '../controller/OffresC.php';
$Offre = new OffresC();
$Offre->deletOffre($_GET["IdO"]);
header('Location:listOffres.php');
?>