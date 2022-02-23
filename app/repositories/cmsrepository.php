<?php

require __DIR__ . '/repository.php';
require __DIR__ . '/../models/event.php';
require __DIR__ . '/../models/Event_item.php';
require __DIR__ . '/../models/location.php';

class CmsRepository extends Repository
{
    public function getRowCount($userName, $password) {
        try {
            $sqlquery = "SELECT Count(User_ID) FROM User WHERE UserName=:username AND Password=:password";
            $stmt = $this->connection->prepare($sqlquery);

            // bind params
            $stmt->bindParam(':username', $userName);
            $stmt->bindParam(':password', $password);

            // execute and get rowcount
            $stmt->execute();
            $rowCount = $stmt->fetchColumn();

            return $rowCount; // <-- return count
            
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getRole($userName) {
        try {
            $sqlquery = "SELECT Role FROM User WHERE UserName=:username";
            $stmt = $this->connection->prepare($sqlquery);

            // bind params
            $stmt->bindParam(':username', $userName);

            // execute and get result
            $stmt->execute();
            return $stmt->fetchColumn();

        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getEvent($name) {
        try {
            $sqlquery = "SELECT * FROM Event WHERE Name=:name";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':name', $name);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'event');
            return $stmt->fetch();

        } catch (PDOException$e) {
            echo $e;
        }
    }

    public function getEventItems($id) {
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
                    WHERE Event_ID=:eventID";

            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam('eventID', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'event_item');
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
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'location');

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

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'event_item');
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
}
