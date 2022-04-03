<?php
namespace Repositories;
namespace Repositories\Cms;

use Repositories\Repository;

use PDO;
use PDOException;
use Models\Restaurant;

class RestaurantRepository extends Repository
{

    // ### GET QUERIES ###
    // ## get all
    public function getAll(){
        try {
            $sqlquery = "SELECT Restaurant_ID, Name, Type, Summary, Max_visitors, Wheelchair_accessible, Adres, Price_Adults, Price_Children FROM Restaurant";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Restaurant');
           
            return $stmt->fetchAll();
            
        } catch (PDOException $e) {
            echo $e;
        }
    }


    public function getOne($id) {
        try {
            $sqlquery = "SELECT Restaurant_ID, Name, Type, Summary, Max_visitors, Wheelchair_accessible, Adres, Price_Adults, Price_Children, Sessions, Duration, Start_Time, Status FROM Restaurant WHERE Restaurant_ID=:id";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Restaurant');
           
            return $stmt->fetch();
            
        } catch (PDOException $e) {
            echo $e;
        }
    }

    // ### UPDATE QUERIES ###
    public function updateOne($restaurant){
        try {
            $sqlquery = "UPDATE Restaurant SET Name=:Name, Type=:Type, Summary=:Summary, Max_visitors=:Max_visitors, Wheelchair_accessible=:Wheelchair_accessible, Price_Adults=:Price_Adults, Price_Children=:Price_Children, Adres=:Adres, Sessions=:Sessions, Duration=:Duration, Start_Time=:Start_Time WHERE Restaurant_ID=:id";
            
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':Name', $restaurant->Name);
            $stmt->bindParam(':Type', $restaurant->Type);
            $stmt->bindParam(':Summary', $restaurant->Summary);
            $stmt->bindParam(':Max_visitors', $restaurant->Max_visitors);
            $stmt->bindParam(':Wheelchair_accessible', $restaurant->Wheelchair_accessible);
            $stmt->bindParam(':Price_Adults', $restaurant->Price_Adults);
            $stmt->bindParam(':Price_Children', $restaurant->Price_Children);
            $stmt->bindParam(':Adres', $restaurant->Adres);
            $stmt->bindParam(':Sessions', $restaurant->sessions);
            $stmt->bindParam(':Duration', $restaurant->duration);
            $stmt->bindParam(':Start_Time', $restaurant->start_time);
            $stmt->bindParam(':id', $restaurant->Restaurant_ID);

            $stmt->execute();
            header('Location: /cms/restaurant?id=' . $restaurant->Restaurant_ID);
            
        } catch (PDOException $e) {
            echo $e;
        }
    }


    // ### INSERT QUERIES ###
    public	function insertOne($restaurant){
        try {
            $sqlquery = "INSERT INTO Restaurant(Name, Type, Summary, Max_visitors, Wheelchair_accessible, Price_Adults, Price_Children, Adres, Sessions, Duration, Start_Time, Status) VALUES (:Name, :Type, :Summary, :Max_visitors, :Wheelchair_accessible, :Price_Adults, :Price_Children, :Adres, :Sessions, :Duration, :Start_Time, :status)";
            $status = true;
            $stmt = $this->connection->prepare($sqlquery);

            //$stmt->bindParam(':Order_ID', $order->Order_ID);
            $stmt->bindParam(':Name', $restaurant->Name);
            $stmt->bindParam(':Type', $restaurant->Type);
            $stmt->bindParam(':Summary', $restaurant->Summary);
            $stmt->bindParam(':Max_visitors', $restaurant->Max_visitors);
            $stmt->bindParam(':Wheelchair_accessible', $restaurant->Wheelchair_accessible);
            $stmt->bindParam(':Price_Adults', $restaurant->Price_Adults);
            $stmt->bindParam(':Price_Children', $restaurant->Price_Children);
            $stmt->bindParam(':Adres', $restaurant->Adres);
            $stmt->bindParam(':Sessions', $restaurant->sessions);
            $stmt->bindParam(':Duration', $restaurant->duration);
            $stmt->bindParam(':Start_Time', $restaurant->start_time);
            $stmt->bindParam(':status', $status);

            $stmt->execute();
            header('Location: /cms/restaurant/add');

        } catch (PDOException $e) {
            echo $e;
        }
    }


    // ### DELETE QUERIES ###
    public	function deleteOne($id){
        try {
            $sqlquery = "DELETE FROM Restaurant WHERE Restaurant_ID =:id";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':id', $id);

            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
