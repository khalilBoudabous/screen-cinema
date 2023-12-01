<?php

require '../config.php';

class OffresC
{

    public function listOffres()
    {
        $sql = "SELECT * FROM Offre";
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
        $sql = "INSERT INTO Offre  
        VALUES (NULL, :IdO,:FilmPropose, :Duree,:TypeP)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'IdO' => $Offre->getIdO(),
                'FilmPropose' => $Offre->getFilmPropose(),
                'Duree' => $Offre->getDuree(),
                'TypeP' => $Offre->getTypeP(),
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
                    Duree = :Duree,
                    TypeP = :TypeP
                WHERE IdO = :IdO'
            );
            
            $query->execute([
                'IdO' => $IdO,
                'FilmPropose' => $Offre->getFilmPropose(),
                'Duree ' => $Offre->getDuree (),
                'TypeP' => $Offre->getTypeP(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
 