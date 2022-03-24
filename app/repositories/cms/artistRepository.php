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


    // ## get performers from random arr
    public function getManyFromArr() {
        $ids = $this->getIdArr();
        $arr = array();
        
        try {
            for ($i=0; $i < 3; $i++) { 
                $sqlquery = "SELECT Artist_ID, Name, Description, Type FROM Artist WHERE Artist_ID=:id";
                $stmt = $this->connection->prepare($sqlquery);

                $id = $ids[array_rand($ids)];
                $stmt->bindParam(':id', $id[0]);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Artist');
           
                array_push($arr, $stmt->fetch());
                unset($ids[array_search($id, $ids)]);
            }
            return $arr;
        } catch (PDOException $e) {
            echo $e;
        }
    }


    // ## get all id's
    private function getIdArr() {
        try {
            $sqlquery = "SELECT Artist_ID FROM Artist";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->execute();
            return $stmt->fetchAll();
            
        } catch (PDOException $e) {
            echo $e;
        }
    }


     // ## update an artist
     public function updateOne($id, $name, $desc, $type) {
        try {
            $sqlquery = "UPDATE Artist SET Name=:name, Description=:desc, Type=:type WHERE Artist_ID=:id";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':desc', $desc);
            $stmt->bindParam(':type', $type);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    // ## insert artist
    public function insertOne($name, $desc, $type) {
        try {
            $sqlquery = "INSERT INTO Artist (Name, Description, Type) 
            VALUES (:name, :desc, :type)";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':desc', $desc);
            $stmt->bindParam(':type', $type);

            $stmt->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }

    // ## delete artist
    public function deleteOne($id) {
        try {
            $sqlquery = "DELETE FROM Artist WHERE Artist_ID=:id";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':id', $id);

            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
