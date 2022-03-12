<?php
namespace Repositories;
namespace Repositories\Cms;

use Repositories\Repository;
use Models\Event_Item;

use PDO;
use PDOException;

class EventItemRepository extends Repository
{

    // ### GET QUERIES ###
    // ## get one eventitem
    public function getOne($id) {
        try {
            $sqlquery = "SELECT 
            E.EventItem_ID AS EventItem_ID, 
            E.Name AS Name, 
            E.Description AS Description, 
            E.Type AS Type, 
            E.Date AS Date, 
            E.Start_Time AS Start_Time, 
            L.Name AS Location, 
            E.Ticket_Price AS Ticket_Price, 
            E.End_Time AS End_Time, 
            E.Tickets AS Tickets, 
            E.Event_ID AS Event_ID 
                FROM Event_Item E 
                INNER JOIN Location L ON E.Location_ID = L.Location_ID 
                WHERE EventItem_ID=:itemID";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':itemID', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Event_Item');
            return $stmt->fetch();

        } catch (PDOException $e) {
            echo $e;
        }
    }

    // ## get event items
    public function getMany($id, $date) {
        try {
            $sqlquery = "SELECT 
                E.EventItem_ID AS EventItem_ID, 
                E.Name AS Name, 
                E.Description AS Description, 
                E.Type AS Type, 
                E.Date AS Date, 
                E.Start_Time AS Start_Time, 
                L.Name AS Location, 
                E.Ticket_Price AS Ticket_Price, 
                E.End_Time AS End_Time, 
                E.Tickets AS Tickets, 
                E.Event_ID AS Event_ID 
                    FROM Event_Item E 
                    INNER JOIN Location L ON E.Location_ID = L.Location_ID 
                    WHERE Event_ID=:eventID AND Date=:date" ;
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam('eventID', $id);
            $stmt->bindParam('date', $date);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Event_Item');
            return $stmt->fetchAll();

        } catch(PDOException $e) {
            echo $e;
        }
    }


    // ### UPDATE QUERIES
    // ## update an event item
    public function updateOne($id, $name, $loc, $desc, $date, $start, $end) {
        try {
            $sqlquery = "UPDATE Event_Item SET Name=:name, Description=:desc, Date=:date, Start_Time=:start, Location_ID=:loc, End_Time=:end WHERE EventItem_ID=:id";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam('id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':desc', $desc);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':start', $start);
            $stmt->bindParam(':loc', $loc);
            $stmt->bindParam(':end', $end);

            $stmt->execute();
            
        } catch (PDOException $e) {
            echo $e;
        }
    }


    // ### INSERT QUERIES ###
    // ## insert event item
    public function insertOne($eventItem) {
        try {
            $sqlquery = "INSERT INTO Event_Item (Name, Description, Type, Date, Start_Time, Location_ID, Ticket_Price, End_Time, Tickets, Event_ID) 
            VALUES (:name, :desc, 'test', :date, :start, :loc, :price, :end, :tickets, :eventID)";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':name', $eventItem->Name);
            $stmt->bindParam(':desc', $eventItem->Description);
            $stmt->bindParam(':date', $eventItem->Date);
            $stmt->bindParam(':start', $eventItem->Start_Time);
            $stmt->bindParam(':loc', $eventItem->Location_ID);
            $stmt->bindParam(':price', $eventItem->Ticket_Price);
            $stmt->bindParam(':end', $eventItem->End_Time);
            $stmt->bindParam(':tickets', $eventItem->Tickets);
            $stmt->bindParam(':eventID', $eventItem->Event_ID);

            $stmt->execute();
            return $this->connection->lastInsertId();

        } catch (PDOException $e) {
            echo $e;
        }
    }


    // ### DELETE QUERIES ### 
    // ## delete event item
    public function deleteOne($id) {
        try {
            $sqlquery = "DELETE FROM Event_Item WHERE EventItem_ID=:id";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':id', $id);

            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
