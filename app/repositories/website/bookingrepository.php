<?php

namespace Repositories\Website;
use Repositories\Repository;
use Models\Order;
use PDO;
use PDOException;

class BookingRepository extends Repository
{
   public function insertBooking(){
    
    try {
        $sqlquery = "INSERT INTO Booking (Eventitem_ID, Type, Order_ID, QR_Code_ID, Is_Scanned) VALUES (:Eventitem_ID, :Type, :Order_ID, :QR_Code_ID, :Is_Scanned)"
        $stmt = $this->connection->prepare($sqlquery);

        // $stmt->bindParam(':name', $name);
        // $stmt->bindParam(':desc', $desc);
        // $stmt->bindParam(':type', $type);

        $stmt->execute();

    } catch (PDOException $e) {
        echo $e;
    }
}