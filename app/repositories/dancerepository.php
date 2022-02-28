<?php

require __DIR__ . '/repository.php';
require __DIR__ . '/../models/event.php';

class dancerepository extends Repository
{
    public function getDanceEvents() {
        try {
            $sqlquery = "SELECT Name, Start_Time, Location_ID, Ticket_Price FROM Event_Item WHERE Event_ID = 3";
            // $sqlquery = "SELECT Name, Start_Time, Artist_ID, Location_ID, Ticket_Price FROM Event_Item WHERE Date=:date AND Event_ID = 3";
            $stmt = $this->connection->prepare($sqlquery);

            // bind params
            // $stmt->bindParam(':date', $Date);

            // execute and get result
            $stmt->execute();
            return $stmt->fetchAll();

        } catch (PDOException $e) {
            echo $e;
        }
    }
}