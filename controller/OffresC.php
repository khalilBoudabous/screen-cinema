<?php

require '../config.php';

class OffresC
{


    public function listOffres($Offre_by, $Offre_dir)
    {
        $tri_autorises = array('IdO', 'FilmPropose', 'Duree');
        if (!in_array($Offre_by, $tri_autorises)) {
            $Offre_by = 'IdO'; 
        }

        $sql = "SELECT * FROM Offre ORDER BY $Offre_by $Offre_dir";
        $db = config::getConnexion();
        
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletOffre($IdO)
    {
        $sql = "DELETE FROM Offre WHERE IdO = :IdO";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':IdO', $IdO);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addOffre($Offre)
    {
        $sql = "INSERT INTO Offre(FilmPropose,Duree,montant)
        VALUES ( :FilmPropose, :Duree,:montant)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                
                'FilmPropose' => $Offre->getFilmPropose(),
                'Duree' =>$Offre->getduree(),
                'montant' =>$Offre->getmontant()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showOffre($IdO)
    {
        $sql = "SELECT * from Offre where IdO = $IdO";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $Offre = $query->fetch();
            return $Offre;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateOffre($Offre, $IdO)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE Offre SET 
                    FilmPropose = :FilmPropose, 
                    Duree = :Duree
                WHERE IdO = :IdO'
            );
            
            $query->execute([
                'IdO' => $IdO,
                'FilmPropose' => $Offre->getFilmPropose(),
                'Duree' => $Offre->getDuree ()
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function getNewClaim() {
        $db = new PDO('mysql:host=localhost;dbname=database', 'username', 'password');

        $query = $db->prepare("SELECT * FROM claims WHERE status = 'new'");
        $query->execute(); 
        $newClaims = $query->fetchAll(PDO::FETCH_ASSOC);
        return $newClaims;
      }
      
}
 