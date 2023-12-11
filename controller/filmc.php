<?php

require '../config.php';
require '../model/categorie.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class filmc
{
    public function listfilm()
{
    $sql = "SELECT * FROM films ORDER BY titre_film ASC
    
    ";
    $db = config::getConnexion();
    try {
        $liste = $db->query($sql);
        $result = $liste->fetchAll(PDO::FETCH_ASSOC);

        // Array of colors for each alphabet
        $colors = array(
            'a' => 'lightblue',
            'b' => 'lightgreen',
            'c' => 'lightgray',
            'd' => 'lightpink',
            'e' => 'lightyellow',
            'f' => 'lightgray',
            'g' => 'lavender',
            'h' => 'lightcoral',
            'i' => 'lightskyblue',
            'j' => 'lightseagreen',
            'k' => 'wheat',
            'l' => 'plum',
            'm' => 'aquamarine',
            'n' => 'orchid',
            'o' => 'khaki',
            'p' => 'silver',
            'q' => 'lime',
            'r' => 'palegoldenrod',
            's' => 'paleturquoise',
            't' => 'peachpuff',
            'u' => 'gold',
            'v' => 'tomato',
            'w' => 'deepskyblue',
            'x' => 'mediumseagreen',
            'y' => 'sandybrown',
            'z' => 'mediumorchid'
        );

        // Modify the color of each word in the film title based on the starting alphabet
        foreach ($result as &$film) {
            $titre_film = $film['titre_film'];
            $words = explode(' ', $titre_film);

            foreach ($words as &$word) {
                $firstLetter = strtolower(substr($word, 0, 1));
                if (array_key_exists($firstLetter, $colors)) {
                    $color = $colors[$firstLetter];
                    $word = '<span style="color: ' . $color . ';">' . $word . '</span>';
                }
            }

            $film['titre_film'] = implode(' ', $words);
        }

        return $result;
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}
public function rechercherFilm($keyword){
    $db = config::getConnexion();

    $sql = "SELECT *
    FROM films  LEFT JOIN film_categorie ON film_categorie.id_film = films.id_film 
    WHERE films.titre_film = :keyword
";

try{
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':keyword', $keyword);
    $stmt->execute();

    $categories = $stmt->fetchAll();
    
    return $categories;

    }catch (PDOException $e) 
    {
        

    }
   
}
    public function deleteFilm($id)
    {
        $sql = "DELETE FROM films WHERE id_film = :id";
        try {
            $db = config::getConnexion();
            $req = $db->prepare($sql);
            $req->bindValue(':id', $id);
            $req->execute();
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function addFilm($film, $categorie)
    {
        $sql = "INSERT INTO films (titre_film, duree, realisateur, etoils)
         VALUES (:titre_film, :duree, :realisateur, :etoils)";
        $sql1 = "INSERT INTO categorie (type_c) VALUES (:type_c)";
    
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query1 = $db->prepare($sql1);
    
            $query->execute([
                'titre_film' => $film->getTitre_film(),
                'duree' => $film->getDuree(),
                'realisateur' => $film->getRealisateur(),
                'etoils' => $film->getEtoils()
            ]);
            $filmId = $db->lastInsertId();

            $query1->execute([
                'type_c' => $categorie->getType_c()
            ]);
    
            
            $categorieId = $db->lastInsertId();
    
            $insertRelationSql = "INSERT INTO film_categorie (id_film, id_ca) VALUES (:id_film, :id_ca)";
            $queryRelation = $db->prepare($insertRelationSql);
            $queryRelation->execute([
                'id_film' => $filmId,
                'id_ca' => $categorieId
            ]);
          
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    public function showfilm($id)
    {
        $sql = "SELECT * FROM films WHERE id_film = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();
            $film = $query->fetch();
            return $film;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function updatefilm($film, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE films SET 
                    titre_film = :titre_film, 
                    duree = :duree, 
                    realisateur = :realisateur, 
                    etoils = :etoils
    
                WHERE id_film = :id_film'
            );

            $query->execute([
                'id_film' => $id,
                'titre_film' => $film->gettitre_film(),
                'duree' => $film->getduree(),
                'realisateur' => $film->getrealisateur(),
                'etoils' => $film->getetoils()

            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
