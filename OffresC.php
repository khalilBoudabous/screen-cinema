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
                'Duree' => $Offre->getduree(),
                'montant' => $Offre->getmontant()
            ]);
            print_r($query);
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
            // Fetch existing Offre details from the database
            $existingOffre = $this->showOffre($IdO);

            // Check if the Offre exists
            if ($existingOffre) {
                // Update only the fields that are provided in the form
                $FilmPropose = isset($_POST['FilmPropose']) ? $_POST['FilmPropose'] : $existingOffre['FilmPropose'];
                $Duree = isset($_POST['Duree']) ? $_POST['Duree'] : $existingOffre['Duree'];
                $montant = isset($_POST['montant']) ? $_POST['montant'] : $existingOffre['montant'];

                // Set the properties of the $Offre object
                $Offre->setFilmPropose($FilmPropose);
                $Offre->setDuree($Duree);
                $Offre->setmontant($montant);

                // Execute the update query
                $db = config::getConnexion();
                $query = $db->prepare(
                    'UPDATE Offre SET 
                        FilmPropose = :FilmPropose, 
                        Duree = :Duree,
                        montant = :montant
                    WHERE IdO = :IdO'
                );

                $query->execute([
                    'IdO' => $IdO,
                    'FilmPropose' => $Offre->getFilmPropose(),
                    'Duree' => $Offre->getDuree(),
                    'montant' => $Offre->getmontant()
                ]);

                echo $query->rowCount() . " records UPDATED successfully <br>";
            } else {
                echo "Offre with IdO = $IdO not found.";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    function getNewClaim()
    {
        $db = new PDO('mysql:host=localhost;dbname=database', 'username', 'password');

        $query = $db->prepare("SELECT * FROM claims WHERE status = 'new'");
        $query->execute();
        $newClaims = $query->fetchAll(PDO::FETCH_ASSOC);
        return $newClaims;
    }
}
