<?php

require '../config.php';

class ProduitsC
{

    public function listProduits()
    {
        $sql = "SELECT * FROM Produit";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteProduit($IdP)
    {
        $sql = "DELETE FROM Produit WHERE IdP = :IdP";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':IdP', $IdP);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addProduit($produit)


    {

        print_r($produit);
        $sql =  "INSERT INTO Produit(NomP, Prix) VALUES (:NomP,:Prix)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                
                'NomP' => $produit->getNomP(),
                'Prix' =>$produit->getPrix()
            ]);
            header("Location:listProduits.php");
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showProduit($IdP)
    {
        $sql = "SELECT * from Produit where IdP = $IdP";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $Produit = $query->fetch();
            return $Produit;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateProduit($Produit, $IdP)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE produit SET 
                    NomP = :NomP,
                    Prix = :Prix
                WHERE IdP= :IdP'
            );
            
            $query->execute([
                'IdP' => $IdP,
                'NomP' => $Produit->getNomP(),
                'Prix' => $Produit->getPrix(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
 