<?php

require_once '../config.php';
  ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class categoriec
{
    public function listcategorie()
{
    $sql = "SELECT * FROM categorie ORDER BY type_c ASC";
    $db = config::getConnexion();
    try {
        $liste = $db->query($sql);
        $result = $liste->fetchAll(PDO::FETCH_ASSOC);

        // Array of colors for each alphabet
        $colors = array('a' => 'red',
        'b' => 'blue',
        'c' => 'green',
        'd' => 'purple',
        'e' => 'orange',
        'f' => 'teal',
        'g' => 'pink',
        'h' => 'maroon',
        'i' => 'navy',
        'j' => 'olive',
        'k' => 'brown',
        'l' => 'indigo',
        'm' => 'cyan',
        'n' => 'magenta',
        'o' => 'yellow',
        'p' => 'gray',
        'q' => 'lime',
        'r' => 'silver',
        's' => 'aqua',
        't' => 'coral',
        'u' => 'gold',
        'v' => 'darkred',
        'w' => 'darkblue',
        'x' => 'darkgreen',
        'y' => 'darkorange',
        'z' => 'darkviolet');

        // Modify the color of each word in the category name based on the starting alphabet of type_c
        foreach ($result as &$category) {
            $type_c = $category['type_c'];
            $firstLetter = strtolower(substr($type_c, 0, 1));
            if (array_key_exists($firstLetter, $colors)) {
                $color = $colors[$firstLetter];
                $category['type_c'] = preg_replace("/\b$firstLetter\w+\b/", '<span style="color: ' . $color . ';">$0</span>', $type_c);
            }
        }

        return $result;
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}

    public function deletecategorie($id)
    {
        $sql = "DELETE FROM categorie WHERE id_ca = :id";
        try {
            $db = config::getConnexion();
            $req = $db->prepare($sql);
            $req->bindValue(':id', $id);
            $req->execute();
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function addcategorie($categorie)
    {
        $sql = "INSERT INTO categorie(type_c) VALUES (:type_c)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'type_c' => $categorie->getType_c(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    public function showcategorie($id)
    {
        $sql = "SELECT * FROM categorie WHERE id_ca = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();
            $categorie = $query->fetch();
            return $categorie;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function updatecategorie($categorie, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE categorie SET 
                    type_c = :type_c
                WHERE id_ca = :id_ca'
            );

            $query->execute([
                'id_ca' => $id,
                'type_c' => $categorie->getType_c(),

            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function getCategoriesForFilm($filmId)
    {
        try 
        {
            $db = config::getConnexion();

            $sql = "
            SELECT categorie.type_c
            FROM categorie
            JOIN film_categorie ON categorie.id_ca = film_categorie.id_ca
            WHERE film_categorie.id_film = :filmId;
        ";

            $stmt = $db->prepare($sql);
            $stmt->bindParam(':filmId', $filmId);
            $stmt->execute();

            $categories = $stmt->fetchAll();
            
            return $categories;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}
