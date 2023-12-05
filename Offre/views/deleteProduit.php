<?php
include 'C:\xampp\htdocs\Offre\controller\ProduitsC.php';
$Produit = new ProduitsC();
$Produit->deleteProduit($_GET["IdP"]);
header('Location:listProduits.php');
