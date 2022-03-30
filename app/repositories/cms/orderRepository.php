<?php

namespace Repositories;

namespace Repositories\Cms;

use Repositories\Repository;
use Models\Order;

use PDO;
use PDOException;

class OrderRepository extends Repository
{

    // ### GET QUERIES ###
    public function getAll()
    {
        try {
            $sqlquery = "SELECT Order_ID, PhoneNumber, FullName, Email, Adress, Payment_Due_Date, Total_price, SubTotal FROM `Order`";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Order');

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getOne($order_id)
    {
        try {
            $sqlquery = "SELECT Order_ID, PhoneNumber, FullName, Email, Adress, Payment_Due_Date, Total_price, SubTotal FROM `Order` WHERE Order_ID = :order_id";
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
