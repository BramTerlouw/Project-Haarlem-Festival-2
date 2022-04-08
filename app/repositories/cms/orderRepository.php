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

    // ### INSERT QUERIES ###
    public function insertOne($Fullname, $Adress, $Email, $Phonenumber, $subTotal, $Pricetotal){
        $PayementDate = date("Y/m/d");
        
        

        try {
            $sqlquery = "INSERT INTO `Order` (PhoneNumber, FullName, Email, Adress, Payment_Due_Date, Total_price, subTotal, Payment_Status) 
            VALUES (:PhoneNumber, :FullName, :Email, :Adress, :Payment_Due_Date, :Total_price, :subTotal, false)";

            $stmt = $this->connection->prepare($sqlquery);

            //$stmt->bindParam(':Order_ID', $order->Order_ID);
            $stmt->bindParam(':PhoneNumber', $Phonenumber);
            $stmt->bindParam(':FullName', $Fullname);
            $stmt->bindParam(':Email', $Email);
            $stmt->bindParam(':Adress', $Adress);
            $stmt->bindParam(':Payment_Due_Date', $PayementDate);
            $stmt->bindParam(':Total_price', $Pricetotal);
            $stmt->bindParam(':subTotal', $subTotal);

            $stmt->execute();
            return $this->connection->lastInsertId();

        } catch (PDOException $e) {
            echo $e;
        }
    }

    //method for updating the status of the payment
    public function updatePaymentStatus($id){
        try {
            $sqlquery = "UPDATE Order SET Payment_Status= :Payment_Status WHERE Order_ID=:id";
            $stmt = $this->connection->prepare($sqlquery);
            
            $stmt->bindParam(':Order_ID', $id);
            $stmt->bindParam(':Payment_Status', true);
            
            $stmt->execute();
            
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
