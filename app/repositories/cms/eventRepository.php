<?php
namespace Repositories;
namespace Repositories\Cms;
use Repositories\Repository;
use Models\Event;

use PDO;
use PDOException;

class EventRepository extends Repository
{

    // ### GET QUERIES ###
    // ## get event
    public function getOne($id) {
        try {
            $sqlquery = "SELECT * FROM Event WHERE Event_ID=:id";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Event');
            return $stmt->fetch();

        } catch (PDOException$e) {
            echo $e;
        }
    }

    
    // ## get all event names (for navbar)
    public function getEventNames() {
        try {
            $sqlquery = "SELECT Event_ID, Name From Event";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e;
        }
    }


    // ## get all event item dates for event (overview day selector)
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


    // ## get start and end date of event
    public function getTimespan($id) {
        try {
            $sqlquery = "SELECT StartDate, EndDate FROM Event WHERE Event_ID=:id";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return $stmt->fetch();
        } catch(PDOException $e) {
            echo $e;
        }
    }


    // ### UPDATE QUERIES ###
    // ## update an event
    public function updateOne($id, $eventName, $eventDesc, $eventStart, $eventEnd) {
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




    // ### methods for dashboard data
    // ## get all tickets for a event
    public function getAllTickets($id) {
        try {
            $sqlquery = "SELECT SUM(A.Tickets) FROM Event E INNER JOIN Event_Item A ON E.Event_ID = A.Event_ID WHERE E.Event_ID=:id";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return $stmt->fetch();
        } catch (PDOException $e) {
            echo $e;
        }
    }


    // ## get all sells for a event
    public function getAllSold($id) {
        try {
            $sqlquery = "SELECT COUNT(B.EventItem_ID) FROM Booking B INNER JOIN Event_Item E ON B.EventItem_ID = E.EventItem_ID WHERE E.Event_ID=:id";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return $stmt->fetch();
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
