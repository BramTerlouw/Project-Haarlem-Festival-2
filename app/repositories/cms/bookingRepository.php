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



    // ### INSERT QUERIES ###



    // ### DELETE QUERIES ###
}