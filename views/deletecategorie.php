<?php
include '../controller/categoriec.php';
$categoriec = new categoriec();
$categoriec->deletecategorie($_GET["id"]);
header('Location: showcategorie.php');
?>