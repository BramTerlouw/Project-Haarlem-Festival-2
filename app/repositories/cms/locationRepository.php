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
            $sqlquery = "SELECT * FROM Location";
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
}
