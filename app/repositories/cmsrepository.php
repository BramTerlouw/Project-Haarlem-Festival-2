<?php

require __DIR__ . '/repository.php';

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
}
