<?php
namespace Repositories;

use Repositories\Repository;
use PDO;
use PDOException;

use Models\Restaurant;

// require __DIR__ . '/repository.php';
// require __DIR__ . '/../models/restaurant.php';

Class culinaryRepository extends Repository
{
    public function getRestaurants(){
        try {
            $sqlquery = "SELECT Restaurant_ID, Name, Type, Max_visitors, Wheelchair_accessible FROM Restaurant";
            $stmt = $this->connection->prepare($sqlquery);

            //bind params
            // $stmt->bindParam(':Restaurant_ID', $Restaurant_ID);
            // $stmt->bindParam(':Name', $Name);
            // $stmt->bindParam(':Type', $Type);
            // $stmt->bindParam(':Max_visitors', $Max_visitors);
            // $stmt->bindParam(':Wheelchair_accessible', $Wheelchair_accessible);

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Restaurant');
           
            $data = $stmt->fetchAll();
            var_dump($data);
            // return $stmt->fetchAll();
            
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
?>