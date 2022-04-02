<?php

namespace Repositories\Website;
use Repositories\Repository;
use Models\Order;
use PDO;
use PDOException;

class ReservationRepository extends Repository
{
   public function insertReservation(){
      
      try {
     
         $sqlquery = "INSERT INTO Reservation(Reservation_ID, Date, Time, Restaurant_ID, Amount_Children, Amount_Adults, Message) VALUES (':Reservation_ID',':Date',':Time',':Restaurant_ID',':Amount_children',':Amount_Adults',:Message')";
     
         $stmt = $this->connection->prepare($sqlquery);
     
         $stmt->bindParam(':Reservation_ID', $Reservation_ID);
         $stmt->bindParam(':Date', $Date);
         $stmt->bindParam(':Time', $Time);
         $stmt->bindParam(':Restaurant_ID', $Restaurant_ID);
         $stmt->bindParam(':Amount_Children', $Amount_Children);
         $stmt->bindParam(':Amount_Adults', $Amount_Adults);    
         $stmt->bindParam(':Message', $Message);

          $stmt->execute();
     
         } catch (PDOException $e) {
             echo $e;
         }
   }
}

