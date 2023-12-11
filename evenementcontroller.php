

<?php

require_once '../config.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class evenementcontroller
{




    function addevenement($evenement)
    {
        $sql = "INSERT INTO evenement(id_ev,name,duree,placement,date) VALUES (NULL,:name,:duree,:placement,:date)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'name' => $evenement->getname(),
                'duree' => $evenement->getduree(),
                'placement' => $evenement->getplacement(),
                'date' => $evenement->getdate(),

            ]);
            header("Location:showevents.php");
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function getAllEvents()
    {
        $db = config::getConnexion();
        $sql = "SELECT * FROM evenement";
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $allevents = $query->fetchAll();
            return $allevents;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function supprimerevenement($id)
    {

        try {
            $db = config::getConnexion();
            $sql = "DELETE FROM evenement WHERE id_ev = :id";
            $req = $db->prepare($sql);
            $req->bindValue(':id', $id);
            $req->execute();
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function getEvent($id)
    {
        try {
            $db = config::getConnexion();
            $sql = "SELECT * FROM evenement WHERE id_ev = :id";
            $req = $db->prepare($sql);
            $req->bindValue(':id', $id);
            $req->execute();
            $eventRetrieved = $req->fetch();
            return $eventRetrieved;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function modifierevenement($evenement, $id)
{
    try {
        $db = config::getConnexion();
        $sql = "UPDATE evenement SET 
            name=:name,
            duree=:duree,
            placement=:placement,
            date=:date
            WHERE id_ev=:id";
        $req = $db->prepare($sql);

        $req->execute(
            [
                'id' => $id,
                'name' => $evenement->getname(),
                'duree' => $evenement->getduree(),
                'placement' => $evenement->getplacement(),
                'date' => $evenement->getdate()
            ]
        );
        header("Location: showevents.php");
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
        function getEventsPerSponsor($id){

            $db = config::getConnexion();
        
            $sql = "SELECT evenement.name FROM evenement 
            JOIN event_sponsor ON event_sponsor.id_ev = evenement.id_ev
            WHERE event_sponsor.id_sp = :id";
                    $req = $db->prepare($sql);
                    $req->execute(['id' => $id]);
                    $sponsors = $req->fetchAll();
                    return $sponsors;
           }

}
