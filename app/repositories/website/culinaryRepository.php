<?php
namespace Repositories\Website;

use Repositories\Repository;
use PDO;
use PDOException;

use Models\Restaurant;

// require __DIR__ . '/repository.php';
// require __DIR__ . '/../models/restaurant.php';

Class CulinaryRepository extends Repository
{
    public function getRestaurants(){
        try {
            $sqlquery = "SELECT Restaurant_ID, Name, Type, Summary, Max_visitors, Wheelchair_accessible FROM Restaurant";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Restaurant');
           
            //$data = $stmt->fetchAll();
            //var_dump($data);
            return $stmt->fetchAll();
            
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getRestaurantsByType($type) {
        try {
            $sqlquery = "SELECT Restaurant_ID, Name, Type, Summary, Max_visitors, Wheelchair_accessible FROM Restaurant WHERE Type LIKE :pattern";
            $stmt = $this->connection->prepare($sqlquery);

            $pattern = '%' . $type . '%';
            $stmt->bindParam(':pattern', $pattern);

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Restaurant');
           
            return $stmt->fetchAll();
            
        } catch (PDOException $e) {
            echo $e;
        }
    }


    public function getOne($id) {
        try {
            $sqlquery = "SELECT Restaurant_ID, Name, Type, Summary, Max_visitors, Wheelchair_accessible FROM Restaurant WHERE Restaurant_ID=:id";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Restaurant');
           
            return $stmt->fetch();
            
        } catch (PDOException $e) {
            echo $e;
        }
    }


    // ## get start and end date of event
    public function getTimespan($id) {
        try {
            $sqlquery = "SELECT StartDate, EndDate FROM Event WHERE Event_ID=:id";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return $stmt->fetch();
        } catch(PDOException $e) {
            echo $e;
        }
    }


    public function getTypes() {
        try {
            $sqlquery = "SELECT Type FROM Restaurant GROUP BY Type";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch(PDOException $e) {
            echo $e;
        }
    }
}
?>