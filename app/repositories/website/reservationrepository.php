<?php

namespace Repositories\Website;
use Repositories\Repository;
use Models\Order;
use PDO;
use PDOException;

class ReservationRepository extends Repository
{
   public function insertReservation($reservation, $id){
      //var_dump($reservation['restaurant']->Restaurant_ID);
      try {
     
         $sqlquery = "INSERT INTO Reservation(`Date`, `Time`, Restaurant_ID, Amount_Children, Amount_Adults, Order_ID) VALUES (:Date, :Time, :Restaurant_ID, :Amount_Children, :Amount_Adults, :Order_ID)";
     
         $stmt = $this->connection->prepare($sqlquery);
     
         //$stmt->bindParam(':Reservation_ID', $Reservation_ID);
         $stmt->bindParam(':Date', $reservation['date']);
         $stmt->bindParam(':Time', $reservation['time']);
         $stmt->bindParam(':Restaurant_ID', $reservation['restaurant']->Restaurant_ID);
         $stmt->bindParam(':Amount_Children', $reservation['amountChild']);
         $stmt->bindParam(':Amount_Adults', $reservation['amountAdult']);    
         //$stmt->bindParam(':Message', $reservation['message']);
         $stmt->bindParam(':Order_ID', $id);

          $stmt->execute();
     
         } catch (PDOException $e) {
             echo $e;
         }
    }
}

