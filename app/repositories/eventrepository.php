<?php

namespace Repositories;
use Repositories\Repository;
use Models\Event_Item;
use PDO;
use PDOException;

class eventrepository extends Repository
{
    public function getEvents($event, $date) {
        try {
            if ($event == "jazz")
            {
                $event = 1;
            }
            if ($event == "culinary")
            {
                $event = 2;
            }
            if ($event == "dance")
            {
                $event = 3;
            }
            
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
                    WHERE Event_ID=:event AND Date=:date" ;
            // $sqlquery = "SELECT Name, Start_Time, End_Time, Location_ID, Ticket_Price FROM Event_Item WHERE Date=:date AND Event_ID = :event";
            $stmt = $this->connection->prepare($sqlquery);

            // bind params
            $stmt->bindParam('date', $date);
            $stmt->bindParam(':event', $event);

            // execute and get result
            $stmt->execute();
            return $stmt->fetchAll();

        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getDates($event) {
        try {
            if ($event == "jazz")
            {
                $event = 1;
            }
            if ($event == "culinary")
            {
                $event = 2;
            }
            if ($event == "dance")
            {
                $event = 3;
            }
            $sqlquery = "SELECT DISTINCT Date FROM Event_Item WHERE Event_ID = :event";
            $stmt = $this->connection->prepare($sqlquery);

            // bind params
            $stmt->bindParam(':event', $event);

            // execute and get result
            $stmt->execute();
            return $stmt->fetchAll();

        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getArtists($event) {
        try {
            if ($event == "jazz")
            {
                $event = "Band";
            }
            if ($event == "dance")
            {
                $event = "DJ";
            }

            $sqlquery = "SELECT Artist_ID, Name, Description FROM Artist WHERE Type = :event";
            $stmt = $this->connection->prepare($sqlquery);

            // bind params
            $stmt->bindParam(':event', $event);

            // execute and get result
            $stmt->execute();
            return $stmt->fetchAll();

        } catch (PDOException $e) {
            echo $e;
        }
    }

}