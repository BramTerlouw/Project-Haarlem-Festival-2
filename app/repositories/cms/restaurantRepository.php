<?php
namespace Repositories;
namespace Repositories\Cms;

use Repositories\Repository;

use PDO;
use PDOException;
use Models\Restaurant;

class RestaurantRepository extends Repository
{

    // ### GET QUERIES ###
    // ## get all
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


    public function getOne($id) {
        try {
            $sqlquery = "SELECT Restaurant_ID, Name, Type, Summary, Max_visitors, Wheelchair_accessible, Adres, Price_Adults, Price_Children FROM Restaurant WHERE Restaurant_ID=:id";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Restaurant');
           
            return $stmt->fetch();
            
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
