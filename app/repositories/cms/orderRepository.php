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
    public function getAll() {
        try {
            $sqlquery = "SELECT Order_ID, PhoneNumber, FullName, Email FROM Order";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Order');

            return $stmt->fetchAll();

        } catch (PDOException $e) {
            echo $e;
        }
    }


    // ### UPDATE QUERIES ###
    public	function updateOne(){
        try {
            $sqlquery = "UPDATE Order SET Ticket_Price=:price, Tickets=:amount WHERE EventItem_ID=:id";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':amount', $amount);
            $stmt->bindParam(':id', $id);

            $stmt->execute();
            
        } catch (PDOException $e) {
            echo $e;
        }
    }


    // ### INSERT QUERIES ###
    public	function insertOne(){
        try {
            $sqlquery = "INSERT INTO Order (PhoneNumber, FullName, Email, Adress) 
            VALUES (:Order_ID, :PhoneNumber, :FullName, :Email, :Adress)";
            $stmt = $this->connection->prepare($sqlquery);

            //$stmt->bindParam(':Order_ID', $order->Order_ID);
            $stmt->bindParam(':PhoneNumber', $Phonenumber);
            $stmt->bindParam(':FullName', $FullName);
            $stmt->bindParam(':Email', $Email);
            $stmt->bindParam(':Adress', $Adress);
            $stmt->bindParam(':Payment_Due_Date', $order->Payment_Due_Date);
            $stmt->bindParam(':Total_price', $order->Total_price);
            $stmt->bindParam(':subTotal', $order->subTotal);

            $stmt->execute();
            //return $this->connection->lastInsertId();

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
