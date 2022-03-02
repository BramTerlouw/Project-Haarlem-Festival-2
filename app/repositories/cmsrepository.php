<?php
namespace Repositories;
use Repositories\Repository;
use Models\Event;
use Models\Event_Item;
use Models\Location;

use PDO;
use PDOException;

class CmsRepository extends Repository
{

    public function getEvent($name) {
        try {
            $sqlquery = "SELECT * FROM Event WHERE Name=:name";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':name', $name);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Event');
            return $stmt->fetch();

        } catch (PDOException$e) {
            echo $e;
        }
    }

    public function getEventItems($id, $date) {
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

    public function getLocations() {
        try {
            
            $sqlquery = "SELECT * FROM Location";
            $stmt = $this->connection->prepare($sqlquery);


            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Location');

            return $stmt->fetchAll();

        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getEventLocations($locationArr) {
        try {
            $questionmarks = str_repeat("?,", count($locationArr)-1) . "?";
            $sqlquery = "SELECT Name FROM Location WHERE Name IN ($questionmarks)";
            
            $stmt = $this->connection->prepare($sqlquery);
            $stmt->execute($locationArr);
            
            $stmt->setFetchMode(PDO::FETCH_COLUMN, 0);
            return $stmt->fetchAll();

        } catch(PDOException $e) {
            echo $e;
        }
    }

    public function getEVentItem($id) {
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

    public function getPerformers($id) {
        try {
            
            $sqlquery = "SELECT A.Artist_ID, A.Name 
            FROM Lineup L 
            INNER JOIN Artist A ON A.Artist_ID = L.Artist_ID
            WHERE L.EventItem_ID=:itemID";

            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':itemID', $id);
            $stmt->execute();

            return $stmt->fetchAll();

        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getDates($id) {
        try {

            $sqlquery = "SELECT DISTINCT Date FROM Event_Item WHERE Event_ID=:id";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':id', $id);

            $stmt->execute();
            return $stmt->fetchAll();

        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function updateEvent($id, $eventName, $eventDesc, $eventStart, $eventEnd) {
        try {
            $sqlquery = "Update Event SET Name=:name, StartDate=:start, EndDate=:end, Description=:desc WHERE Event_ID=:id";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam('id', $id);
            $stmt->bindParam(':name', $eventName);
            $stmt->bindParam(':desc', $eventDesc);
            $stmt->bindParam(':start', $eventStart);
            $stmt->bindParam(':end', $eventEnd);

            $stmt->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getEventNames() {
        try {
            $sqlquery = "SELECT Name From Event";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
