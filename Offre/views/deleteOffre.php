<?php
include '../controller/OffreC.php';
$Offre = new OffreC();
$Offre->deletOffre($_GET["IdO"]);
header('Location:listOffres.php');
