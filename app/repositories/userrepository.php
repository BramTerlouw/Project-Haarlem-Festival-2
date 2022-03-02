<?php

namespace Repositories;
use Repositories\Repository;
use Models\User;
use PDO;
use PDOException;


class UserRepository extends Repository {

    // Temporary login
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

    // public function getCredentials($userName) {
    //     try {
            
    //         $sqlquery = "SELECT UserName, Password FROM User Where UserName=:username";
    //         $stmt = $this->connection->prepare($sqlquery);

    //         $stmt->bindParam('username', $userName);
    //         $stmt->execute();

    //         return $stmt->fetchAll();
            
    //     } catch (PDOException $e) {
    //         echo $e;
    //     }
    // }




    // get the role of logged user for example
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




    // get one user
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




    // get all users
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


    // update a user
    public function updateOne($userArr) {
        try {
            $paramArr = [':id', ':fullName', ':userName', ':password',':birthDate', ':gender', ':address', ':postcode', ':city', ':role', ':supervisor', ':email', ':phoneNumber'];

            $sqlquery = "UPDATE User SET FullName=:fullName, UserName=:userName, Password=:password,BirthDate=:birthDate, Gender=:gender, Address=:address, PostCode=:postcode, City=:city, Role=:role, Supervisor=:supervisor, Email=:email, PhoneNumber=:phoneNumber WHERE User_ID=:id";
            $stmt = $this->connection->prepare($sqlquery);

            for ($i=0; $i < sizeof($paramArr); $i++) { 
                $stmt->bindParam($paramArr[$i], $userArr[$i]);
            }

            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }




    // insert a user
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
                header('Location: /user');
            } else {
                header('Location: /user/add?error=emailExists');
            }

        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function validateEmail($email) {
        $emailList = $this->getAllEmail();

        foreach ($emailList as $em) { if ($em[0] == $email) return false; }
        return true;
    }

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




    // Delete a user
    public function deleteOne($id) {
        try {
            $sqlquery = "Delete FROM User WHERE User_ID=:id";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':id', $id);
            $stmt->execute();

            header('Location: /user');
        } catch (PDOException $e) {
            echo $e;
        }
    }




    // Get all event names for nav
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




    // Reset password
    public function setResetCode($email, $code) {
        try {
            $sqlquery = "INSERT INTO resetPassword (code, email) VALUES (:code, :email)";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':code', $code);

            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getResetMail($code) {
        try {
            $sqlquery = "SELECT email FROM resetPassword WHERE code=:code";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':code', $code);
            $stmt->execute();

            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function setPassword($email, $password) {
        try {
            $sqlquery = "Update User SET Password=:password WHERE Email=:email";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);

            $stmt->execute();
            header('Location: /cms/login');
        } catch (PDOException $e) {
            echo $e;
        }
    }
}