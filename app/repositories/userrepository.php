<?php

require __DIR__ . '/repository.php';
require __DIR__ . '/../models/user.php';

class UserRepository extends Repository {
    public function getPersonalInfo() {
        try {
            $sqlquery = "SELECT * FROM User WHERE UserName=:userName";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':userName', $_SESSION['userName']);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'user');
            return $stmt->fetch();

        } catch (PDOException $e) {
            echo $e;
        }
    }
}
