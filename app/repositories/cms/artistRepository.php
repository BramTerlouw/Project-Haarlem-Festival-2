<?php
namespace Repositories;
namespace Repositories\Cms;

use Repositories\Repository;
use Models\Artist;

use PDO;
use PDOException;

class ArtistRepository extends Repository
{

    // ### GET QUERIES ###
    // ## get all artists
    public function getAll() {
        try {
            $sqlquery = "SELECT Artist_ID, Name, Description, Type FROM Artist";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Artist');
            
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e;
        }
    }


    // ## get performers for event item
    public function getMany($id) {
        try {
            $sqlquery = "SELECT A.Artist_ID, A.Name, A.Description, A.Type 
            FROM Lineup L 
            INNER JOIN Artist A ON A.Artist_ID = L.Artist_ID
            WHERE L.EventItem_ID=:itemID";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':itemID', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Artist');
            return $stmt->fetchAll();

        } catch (PDOException $e) {
            echo $e;
        }
    }


     // ## update an artist
     public function updateOne($id, $name, $desc, $type) {
        try {
            $sqlquery = "UPDATE Artist SET Name=:name, Description=:desc, Type=:type, WHERE Artist_ID=:id";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam('id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':desc', $desc);
            $stmt->bindParam(':type', $type);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
