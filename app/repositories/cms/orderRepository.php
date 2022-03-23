<?php
namespace Repositories;
namespace Repositories\Cms;

use Repositories\Repository;
use Models\Order;

use PDO;
use PDOException;

class OrderRepository extends Repository
{

    // ### GET QUERIES ###
    public function getAll() {
        try {
            $sqlquery = "SELECT Order_ID, PhoneNumber, FullName, Email, Is_Scanned FROM `Order`";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Order');

            return $stmt->fetchAll();

        } catch (PDOException $e) {
            echo $e;
        }
    }


    // ### UPDATE QUERIES ###



    // ### INSERT QUERIES ###



    // ### DELETE QUERIES ###
}
