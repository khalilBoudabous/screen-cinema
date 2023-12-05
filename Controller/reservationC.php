<?php
require '..\config.php';
class reservationC {
   

    public function getReservationById($id_r) {
        $sql = "SELECT * FROM reservation WHERE id_r = :id_r";
        $db = config::getConnexion();
        
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id_r', $id_r);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function listreservation() {
        $tab = array(); 

        $sql = "SELECT * FROM reservation"; 
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

    function deletereservation($id_r)
    {
        $sql = "DELETE FROM reservation WHERE id_r = :id_r";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_r', $id_r);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addreservation($reservation) 
    {
        $sql = 'INSERT INTO reservation VALUE(NULL, :horraires, :date, :quantite, :id_t, :methode_p)';
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'horraires' => $reservation->gethorraires(), 
                'date' => $reservation->getdate(),
                'quantite' => $reservation->getquantite(),
                'id_t' => $reservation->getid_t(),
                'methode_p' => $reservation->getmethode_p(),
            ]);
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

public function updatereservation($reservation, $id_r) {
    $sql = "UPDATE reservation SET horraires = :horraires, date = :date, qunatite = :quantite, id_t = :id_t, methode_p = :methode_p WHERE id_r = :id_r";
    $db = config::getConnexion();

    try {
        $query = $db->prepare($sql);
        $query->execute([
            'id_r' => $id_r,
            'horraires' => $reservation->gethorraires(),
            'date' => $reservation->getdate(),
            'qnuatite' => $reservation->getquantite(),
            'id_t' => $reservation->getid_t(),
            'methode_p' => $reservation->getmethode_p(),
        ]);
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}
}
?>