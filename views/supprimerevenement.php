<?php
include '../controller/evenementcontroller.php';
$eventc = new evenementcontroller();
$eventc->supprimerevenement($_GET["id"]);
header('Location: showevents.php');
?>