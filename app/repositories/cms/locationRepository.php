<?php
namespace Repositories;
namespace Repositories\Cms;

use Repositories\Repository;
use Models\Location;

use PDO;
use PDOException;

class LocationRepository extends Repository
{

    // ### GET QUERIES ###
    // ## get all locations
    public function getAll() {
        try {
            $sqlquery = "SELECT * FROM Location
                        ORDER BY Name;";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Location');

            return $stmt->fetchAll();

        } catch (PDOException $e) {
            echo $e;
        }
    }


    // ## get locations for event
    public function getManyFromArr($locationArr) {
        try {
            $questionmarks = str_repeat("?,", count($locationArr)-1) . "?";
            $sqlquery = "SELECT Name FROM Location WHERE Name IN ($questionmarks)";
            
            $stmt = $this->connection->prepare($sqlquery);
            $stmt->execute($locationArr);
            
            $stmt->setFetchMode(PDO::FETCH_COLUMN, 0);
            return $stmt->fetchAll();

        } catch(PDOException $e) {
            echo $e;
        }
    }

     // ## update location
     public function updateOne($id, $name, $address) {
        try {
            $sqlquery = "UPDATE Location SET Name=:name, Address=:address WHERE Location_ID=:id";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':address', $address);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    // ## insert location
    public function insertOne($name, $address) {
        try {
            $sqlquery = "INSERT INTO Location (Name, Address) 
            VALUES (:name, :address)";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':address', $address);

            $stmt->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }

    // ## delete location
    public function deleteOne($id) {
        try {
            $sqlquery = "DELETE FROM Location WHERE Location_ID=:id";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':id', $id);

            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
