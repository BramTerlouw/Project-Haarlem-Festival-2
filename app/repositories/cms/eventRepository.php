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
    public function getOneByName($name) {
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

    
    // ## get all event names (for navbar)
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
}
