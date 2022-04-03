<?php
namespace Repositories\Website;

use Repositories\Repository;
use PDO;
use PDOException;

use Models\Restaurant;

Class CulinaryRepository extends Repository
{
    public function getAll(){
        try {
            $sqlquery = "SELECT Restaurant_ID, Name, Type, Summary, Max_visitors, Wheelchair_accessible, Adres, Price_Adults, Price_Children FROM Restaurant";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Restaurant');
           
            return $stmt->fetchAll();
            
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getManyByType($type) {
        try {
            $sqlquery = "SELECT Restaurant_ID, Name, Type, Summary, Max_visitors, Wheelchair_accessible, Adres, Price_Adults, Price_Children FROM Restaurant WHERE Type LIKE :pattern";
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


    public function getManyFromArr() {
        $ids = $this->getIdArr();
        $arr = array();
        
        try {
            for ($i=0; $i < 3; $i++) { 
                $sqlquery = "SELECT Restaurant_ID, Name, Type, Summary, Max_visitors, Wheelchair_accessible, Adres, Price_Adults, Price_Children FROM Restaurant WHERE Restaurant_ID=:id";
                $stmt = $this->connection->prepare($sqlquery);

                $id = $ids[array_rand($ids)];
                $stmt->bindParam(':id', $id[0]);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Restaurant');
           
                array_push($arr, $stmt->fetch());
                unset($ids[array_search($id, $ids)]);
            }
            return $arr;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    private function getIdArr() {
        try {
            $sqlquery = "SELECT Restaurant_ID FROM Restaurant";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->execute();
            return $stmt->fetchAll();
            
        } catch (PDOException $e) {
            echo $e;
        }
    }


    public function getOne($id) {
        try {
            $sqlquery = "SELECT Restaurant_ID, Name, Type, Summary, Max_visitors, Wheelchair_accessible, Adres, Price_Adults, Price_Children, Sessions, Duration, Start_Time FROM Restaurant WHERE Restaurant_ID=:id";
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