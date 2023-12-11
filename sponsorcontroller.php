

<?php

require_once '../config.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class sponsorcontroller
{




    function addsponsor($sponsor)
    {
        $sql = "INSERT INTO sponsor(id_sp,name,phone,montant) VALUES (NULL,:name,:phone,:montant)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'name' => $sponsor->getname(),
                'phone' => $sponsor->getphone(),
                'montant' => $sponsor->getmontant(),

            ]);
            header("Location:showsponsors.php");
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function getAllSponsors()
    {
        $db = config::getConnexion();
        $sql = "SELECT * FROM sponsor";
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $allsponsors = $query->fetchAll();
            return $allsponsors;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function supprimersponsor($id)
    {

        try {
            $db = config::getConnexion();
            $sql = "DELETE FROM sponsor WHERE id_sp = :id";
            $req = $db->prepare($sql);
            $req->bindValue(':id', $id);
            $req->execute();
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function getSponsor($id)
    {
        try {
            $db = config::getConnexion();
            $sql = "SELECT * FROM sponsor WHERE id_sp = :id";
            $req = $db->prepare($sql);
            $req->bindValue(':id', $id);
            $req->execute();
            $sponsorRetrieved = $req->fetch();
            return $sponsorRetrieved;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function modifierSponsor($sponsor, $id)
    {
        try {
            $db = config::getConnexion();
            $sql = "UPDATE sponsor SET 
            name=:name,
            phone=:phone,
            montant=:montant
            WHERE id_sp=:id";
            $req = $db->prepare($sql);

            $req->execute(
                [
                    'id' => $id,
                    'name' => $sponsor->getname(),
                    'phone' => $sponsor->getphone(),
                    'montant' => $sponsor->getmontant()
                ]
            );
            header("Location: showsponsors.php");
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function tri(){
        $sql="SELECT * FROM evenement order by name ASC";
        $db = config::getConnexion();
    
            try{
                $liste = $db->query($sql);
                return $liste;
                }
                catch(Exception $e){
                die('Erreur:'. $e->getMessage());
                }
            }
   function getSponsorsPerEvent($id){

    $db = config::getConnexion();

    $sql = "SELECT sponsor.name FROM sponsor 
    JOIN event_sponsor ON event_sponsor.id_sp = sponsor.id_sp
    WHERE event_sponsor.id_ev = :id";
            $req = $db->prepare($sql);
            $req->execute(['id' => $id]);
            $sponsors = $req->fetchAll();
            return $sponsors;
   }
}
