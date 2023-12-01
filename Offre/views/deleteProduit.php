<?php
include '../controller/ProduitC.php';
$Produit = new ProduitC();
$Produit->deletProduit($_GET["IdP"]);
header('Location:listProduits.php');
