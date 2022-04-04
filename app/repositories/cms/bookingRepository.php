<?php

namespace Repositories;

namespace Repositories\Cms;

use Repositories\Repository;
use Models\Booking;

use PDO;
use PDOException;

class BookingRepository extends Repository
{

    // ### GET QUERIES ###
    
    public function getOne($order_id)
    {
        try {
            $sqlquery = "SELECT 
            B.Booking_ID AS Booking_ID, 
            E.Name AS Event_Item, 
            B.Type AS Type, 
            B.Order_ID AS Order_ID, 
            B.Qr_Code_ID AS Qr_Code_ID, 
            B.Is_Scanned AS Is_Scanned
                FROM Booking B 
                INNER JOIN Event_Item E ON B.EventItem_ID = E.EventItem_ID 
                WHERE Order_ID=:order_id";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':order_id', $order_id);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    // ### UPDATE QUERIES ###

    public function updateQr($booking_ID, $qrCodeId) {
        try {
            $sqlquery = "UPDATE Booking SET Qr_Code_ID=:qrCodeId WHERE Booking_ID=:id";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':id', $booking_ID);
            $stmt->bindParam(':qrCodeId', $qrCodeId);

            $stmt->execute();
            
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function updateIsScanned($qrCodeId) {
        try {
            $sqlquery = "UPDATE Booking SET Is_Scanned='1' WHERE Qr_Code_ID=:id";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':id', $qrCodeId);

            $stmt->execute();
            
        } catch (PDOException $e) {
            echo $e;
        }
    }


    // ### INSERT QUERIES ###

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

    // ### DELETE QUERIES ###
}