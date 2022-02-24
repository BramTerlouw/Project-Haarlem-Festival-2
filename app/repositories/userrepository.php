<?php

require __DIR__ . '/repository.php';
require __DIR__ . '/../models/user.php';

class UserRepository extends Repository {
    public function getOne($userName) {
        try {
            $sqlquery = "SELECT * FROM User WHERE UserName=:userName";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':userName', $userName);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'user');
            return $stmt->fetch();

        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getAll() {
        try {

            $sqlquery = "SELECT * FROM User";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'user');
            return $stmt->fetchAll();

        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function updateOne($userArr) {
        try {
            $paramArr = [':id', ':fullName', ':userName', ':birthDate', ':gender', ':address', ':postcode', ':city', ':role', ':supervisor', ':email', ':phoneNumber'];

            $sqlquery = "UPDATE User SET FullName=:fullName, UserName=:userName, BirthDate=:birthDate, Gender=:gender, Address=:address, PostCode=:postcode, City=:city, Role=:role, Supervisor=:supervisor, Email=:email, PhoneNumber=:phoneNumber WHERE User_ID=:id";
            $stmt = $this->connection->prepare($sqlquery);

            for ($i=0; $i < sizeof($paramArr); $i++) { 
                $stmt->bindParam($paramArr[$i], $userArr[$i]);
            }

            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function insertOne() {
        try {

            $sqlquery = "";
            $stmt = $this->connection->prepare($sqlquery);



        } catch (PDOException $e) {
            echo $e;
        }
    }
}