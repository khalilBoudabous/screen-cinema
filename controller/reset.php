<?php
session_start();
require_once __DIR__ . "/inscriptionC.php";
$reset=new sign_upC();
$reset->reset($_SESSION["mail"],$_POST["password"]);
header("Location: http://localhost:8080/ff/about/about.php");