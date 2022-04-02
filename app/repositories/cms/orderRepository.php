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
    public	function updateOne(){
        try {
            $sqlquery = "UPDATE Order SET Total_Price=:Total_Price, SubTotal=:SubTotal WHERE Order_ID=:id";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':Total_Price', $Total_Price);
            $stmt->bindParam(':SubTotal', $SubTotal);
            $stmt->bindParam(':id', $id);

            $stmt->execute();
            
        } catch (PDOException $e) {
            echo $e;
        }
    }


    // ### INSERT QUERIES ###
    public function insertOne($Fullname, $Adress, $Email, $Phonenumber){
        $PayementDate = date("Y/m/d");
        $Pricetotal = 10;
        $pricesub = 8;

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
            $stmt->bindParam(':subTotal', $pricesub);

            $stmt->execute();
            return $this->connection->lastInsertId();

        } catch (PDOException $e) {
            echo $e;
        }
    }


    // ### DELETE QUERIES ###
    public	function deleteOne(){
        try {
            $sqlquery = "DELETE FROM Order WHERE Order_ID=:id";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':id', $id);

            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
