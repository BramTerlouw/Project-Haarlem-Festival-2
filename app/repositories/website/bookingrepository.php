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

            $sqlquery = "INSERT INTO Booking (Eventitem_ID, Order_ID, Qr_Code_ID Is_Scanned ) VALUES (:Eventitem_ID, 1, :Order_ID, :Is_Scanned )";

            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':Eventitem_ID', $Eventitem_ID);
            $stmt->bindParam(':Type', $Type);
            $stmt->bindParam(':Order_ID', );
            $stmt->bindParam(':Qr_Code_ID', );
            $stmt->bindParam(':Is_Scanned', $Is_Scanned);
            

            $stmt->execute();

        }catch (PDOException $e) {
            echo $e;
        }
    }
}
