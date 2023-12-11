<?php
require '..\config.php';
class ticketsC {
   

    public function getTicketsById($id_t) {
        $sql = "SELECT * FROM tickets WHERE id_t = :id_t";
        $db = config::getConnexion();
        
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id_t', $id_t);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function listtickets() {
        $tab = array(); 

        $sql = "SELECT * FROM tickets"; 
        $db = config::getConnexion();
        
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $tab = $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }

        return $tab;
    }

    public function deletetickets($id_t) 
    {
        $sql = "DELETE FROM tickets WHERE id_t = :id_t"; 
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_t', $id_t);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addtickets($tickets) 
    {
        $sql = 'INSERT INTO tickets VALUE(NULL, :prix, :id_film)';
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'prix' => $tickets->getprix(), 
                'id_film' => $tickets->getid_film(),
            ]);
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

}
?>