<?php

namespace Repositories\Website;
use Repositories\Repository;
use Models\Order;
use PDO;
use PDOException;

class BookingRepository extends Repository
{
    public function insertBooking($booking, $id){
       $qrcode_ID = 1;
       $isqrscanned= 0;
       //var_dump($booking['item']->EventItem_ID);
        try {

            $sqlquery = "INSERT INTO Booking (EventItem_ID, Order_ID, Qr_Code_ID, Is_Scanned ) VALUES (:Eventitem_ID, :Order_ID, :Qr_Code_ID, :Is_Scanned )";

            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':Eventitem_ID', $booking['item']->EventItem_ID);
            $stmt->bindParam(':Order_ID', $id);
            $stmt->bindParam(':Qr_Code_ID', $qrcode_ID);
            $stmt->bindParam(':Is_Scanned', $isqrscanned);
            

            $stmt->execute();
            //var_dump($booking);

        }catch (PDOException $e) {
            echo $e;
        }
    }
}
