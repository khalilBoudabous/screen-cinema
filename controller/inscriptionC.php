<?php

require 'C:\xampp\htdocs\ff\config.php';

class sign_upC
{
    private $dbb;
    
    public function __construct()
        {
            $this->dbb = config::getConnexion();
        }

    public function listsign_ups()
    {
        $sql = "SELECT * FROM signup";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (PDOException $e) {
            throw new Exception('Error fetching sign-ups: ' . $e->getMessage());
        }
    }

    function deletesign_up($id)
    {
        $sql = "DELETE FROM signup WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function addsign_up($sign_up)
    {
        $sql = "INSERT INTO signup  VALUES (NULL,:email, :Birthdate, :Username, :Password)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'email' => $sign_up->getemail(),
                'Birthdate' => $sign_up->getBirthdate(),
                'Username' => $sign_up->getUsername(),
                'Password' => $sign_up->getPassword(),
            ]);
        } catch (PDOException $e) {
            throw new Exception('Error adding sign-up: ' . $e->getMessage());
        }
    }

    public function showsign_up($id)
    {
        $sql = "SELECT * FROM signup WHERE id = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();
            $sign_up = $query->fetch();
            return $sign_up;
        } catch (PDOException $e) {
            throw new Exception('Error fetching sign-up details: ' . $e->getMessage());
        }
    }
    public function showuser()
    {
        $query = $this->dbb->prepare("SELECT * FROM signup");
        $query->execute();
        return $query->fetchAll();
    }

    public function updatesign_up($sign_up, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE signup SET 
                    email = :email, 
                    Birthdate = :Birthdate, 
                    Username = :Username, 
                    Password = :Password
                WHERE id = :id'
            );

            $query->execute([
                'id' => $id,
                'email' => $sign_up->getemail(),
                'Birthdate' => $sign_up->getBirthdate(),
                'Username' => $sign_up->getUsername(),
                'Password' => $sign_up->getPassword(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            throw new Exception('Error updating sign-up: ' . $e->getMessage());
        }
    }
    function reset($mail,$password)
    {
        $query=$this->dbb->prepare("UPDATE signup SET Password = :password WHERE email = :email ");
        $query->bindValue(":password",$password);
        $query->bindValue(":email",$mail);
        $query->execute();
    }

}

   