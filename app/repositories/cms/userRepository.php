<?php
namespace Repositories;
namespace Repositories\Cms;

use Repositories\Repository;

use PDO;
use PDOException;

class UserRepository extends Repository
{

    // ### GET QUERIES ###
    // ## get one user
    public function getOne($userName) {
        try {
            $sqlquery = "SELECT * FROM User WHERE UserName=:userName";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':userName', $userName);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\User');
            return $stmt->fetch();

        } catch (PDOException $e) {
            echo $e;
        }
    }



    // ## get all users
    public function getAll() {
        try {
            $sqlquery = "SELECT * FROM User";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\User');
            return $stmt->fetchAll();

        } catch (PDOException $e) {
            echo $e;
        }
    }



    // ## get filtered data users
    public function getMany($filter) {
        try {
            $sqlquery = "SELECT * FROM User WHERE FullName LIKE :pattern OR Email LIKE :pattern";
            $stmt = $this->connection->prepare($sqlquery);

            $pattern = '%' . $filter . '%';
            $stmt->bindParam(':pattern', $pattern);

            $stmt->execute();
            
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\User');
            return $stmt->fetchAll();

        } catch (PDOException $e) {
            echo $e;
        }
    }


    // ## get all mail
    private function getAllEmail() {
        try {
            $sqlquery = "SELECT DISTINCT Email FROM User";
        
            $stmt = $this->connection->prepare($sqlquery);
            $stmt->execute();
        
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e;
        }
    }


    // ### UPDATE QUERIES ###
    // update a user
    public function updateOne($userArr, $pwChange) {
        try {

            if ($pwChange) {
                $paramArr = [':id', ':fullName', ':userName', ':password',':birthDate', ':gender', ':address', ':postcode', ':city', ':role', ':supervisor', ':email', ':phoneNumber'];

                $sqlquery = "UPDATE User SET FullName=:fullName, UserName=:userName, Password=:password,    BirthDate=:birthDate, Gender=:gender, Address=:address, PostCode=:postcode, City=:city, Role=:role, Supervisor=:supervisor, Email=:email, PhoneNumber=:phoneNumber WHERE User_ID=:id";
            } else {
                $paramArr = [':id', ':fullName', ':userName', ':birthDate', ':gender', ':address', ':postcode', ':city', ':role', ':supervisor', ':email', ':phoneNumber'];

                $sqlquery = "UPDATE User SET FullName=:fullName, UserName=:userName, BirthDate=:birthDate, Gender=:gender, Address=:address, PostCode=:postcode, City=:city, Role=:role, Supervisor=:supervisor, Email=:email, PhoneNumber=:phoneNumber WHERE User_ID=:id";
            }
            $stmt = $this->connection->prepare($sqlquery);

            for ($i=0; $i < sizeof($paramArr); $i++) { 
                $stmt->bindParam($paramArr[$i], $userArr[$i]);
            }

            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }


    // ## set password
    public function setPassword($email, $password) {
        try {
            $sqlquery = "Update User SET Password=:password WHERE Email=:email";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);

            $stmt->execute();
            header('Location: /cms/auth');
        } catch (PDOException $e) {
            echo $e;
        }
    }



    // ### INSERT QUERIES
    // ##insert a user
    public function insertOne($userArr) {
        try {
            $paramArr = [':fullName', ':userName', ':password',':birthDate', ':gender', ':address', ':postcode', ':city', ':role', ':supervisor', ':email', ':phoneNumber'];
            
            $sqlquery = "INSERT INTO User (FullName, UserName, Password, BirthDate, Gender, Address, PostCode, City, Role, Supervisor, Email, PhoneNumber)
            VALUES (:fullName, :userName, :password, :birthDate, :gender, :address, :postcode, :city, :role, :supervisor, :email, :phoneNumber)";

            $stmt = $this->connection->prepare($sqlquery);

            for ($i=0; $i < sizeof($paramArr); $i++) { 
                $stmt->bindParam($paramArr[$i], $userArr[$i]);
            }
            
            if ($this->validateEmail($userArr[10])) {
                $stmt->execute();
                header('Location: /cms/user');
            } else {
                header('Location: /cms/user/add?error=emailExists');
            }

        } catch (PDOException $e) {
            echo $e;
        }
    }


    // ### DELETE QUERIES
    // ##Delete a user
    public function deleteOne($id) {
        try {
            $sqlquery = "Delete FROM User WHERE User_ID=:id";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':id', $id);
            $stmt->execute();

            header('Location: /cms/user');
        } catch (PDOException $e) {
            echo $e;
        }
    }


    // ## check if mail is valid mail
    public function validateEmail($email) {
        $emailList = $this->getAllEmail();

        foreach ($emailList as $em) { if ($em[0] == $email) return false; }
        return true;
    }
}
