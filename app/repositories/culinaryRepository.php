<?php

require __DIR__ . '/repository.php';
require __DIR__ . '/../models/restaurant.php';

Class culinaryRepository extends Repository
{
    public function getRestaurants($Restaurant_ID, $Name, $Type, $Max_visitors, $Wheelchair_accessible){
        try {
            $sqlquery = "SELECT Restaurant_ID, Name, Type, Max_visitors, Wheelchair_accessible FROM Restaurant";
            $stmt = $this->connection->prepare($sqlquery);

            $results = ($sqlquery, $stmt)
            
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
?>