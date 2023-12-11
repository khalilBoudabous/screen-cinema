<?php
include '../controller/sponsorcontroller.php';
$sponsorc = new sponsorcontroller();
$sponsorc->supprimersponsor($_GET["id"]);
header('Location: showsponsors.php');
?>