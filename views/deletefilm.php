<?php
include '../controller/filmc.php';
$filmc = new filmc();
$filmc->deletefilm($_GET["id"]);
header('Location: showfilm.php');
?>