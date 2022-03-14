<?php
namespace Repositories;
namespace Repositories\Cms;

use Repositories\Repository;

use PDO;
use PDOException;

class LineupRepository extends Repository
{

    // ### GET QUERIES ###
    // ## get the lineup
    public function getOne($id) {
        try {
            $sqlquery = "SELECT LineUp_ID, EventItem_ID, Artist_ID FROM Lineup WHERE EventItem_ID=:id";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Lineup');

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e;
        }
    }


    // ### UPDATE QUERIES
    // ## update lineup rows
    public function updateOne($eventID, $performerID) {
        try {
            $sqlquery = "INSERT INTO Lineup (EventItem_ID, Artist_ID) VALUES (:event, :artist)";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':event', $eventID);
            $stmt->bindParam(':artist', $performerID);

            $stmt->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }


    // ### DELETE QUERIES ###
    // ## Delete lineup row
    public function deleteOne($lineupID) {
        try {
            $sqlquery = "DELETE FROM Lineup WHERE LineUp_ID=:id";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':id', $lineupID);

            $stmt->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }
}
