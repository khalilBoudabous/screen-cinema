<?php
include 'C:\xampp\htdocs\ff\controller\inscriptionC.php';
$clientC = new  sign_upC();
$clientC->deletesign_up($_GET["id"]);
header('Location:listsign-up.php');

