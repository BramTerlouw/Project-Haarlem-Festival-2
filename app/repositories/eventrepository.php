<?php

namespace Repositories;
use Repositories\Repository;
use Models\Event_Item;
use PDO;
use PDOException;

class eventrepository extends Repository
{
    public function getEvents($event) {
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
            $sqlquery = "SELECT Name, Start_Time, End_Time, Location_ID, Ticket_Price FROM Event_Item WHERE Event_ID = :event";
            // $sqlquery = "SELECT Name, Start_Time, End_Time, Location_ID, Ticket_Price FROM Event_Item WHERE Date=:date AND Event_ID = :event";
            $stmt = $this->connection->prepare($sqlquery);

            // bind params
            // $stmt->bindParam(':date', $Date);
            $stmt->bindParam(':event', $event);

            // execute and get result
            $stmt->execute();
            return $stmt->fetchAll();

        } catch (PDOException $e) {
            echo $e;
        }
    }

}