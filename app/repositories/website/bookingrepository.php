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

            $sqlquery = "INSERT INTO Booking (Eventitem_ID, Type, Order_ID, QR_Code_ID, 
            Is_Scanned) VALUES (:Eventitem_ID, :Type, :Order_ID, :QR_Code_ID, :Is_Scanned)";

            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':Eventitem_ID', $Eventitem_ID);
            $stmt->bindParam(':Type', $Type);
            $stmt->bindParam(':Order_ID', $Order_ID);
            $stmt->bindParam(':QR_Code_ID', $QR_Code_ID);
            $stmt->bindParam(':Is_Scanned', $Is_Scanned);
            

            $stmt->execute();

        }catch (PDOException $e) {
            echo $e;
        }
    }
}
