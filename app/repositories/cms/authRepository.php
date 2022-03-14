<?php
namespace Repositories;
namespace Repositories\Cms;
use Repositories\Repository;
use Models\Event;

use PDO;
use PDOException;

class AuthRepository extends Repository
{
    // ### GET QUERIES ###
    // ## get credentials
    public function getCredentials($userName) {
        try {
            
            $sqlquery = "SELECT UserName, Password FROM User Where UserName=:username";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam('username', $userName);
            $stmt->execute();

            return $stmt->fetchAll();
            
        } catch (PDOException $e) {
            echo $e;
        }
    }


    // ## get the role of logged user for example
    public function getRole($userName) {
        try {
            $sqlquery = "SELECT Role FROM User WHERE UserName=:username";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':username', $userName);

            $stmt->execute();
            return $stmt->fetchColumn();

        } catch (PDOException $e) {
            echo $e;
        }
    }


    // ## get reset email
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


    // ### INSERT QUERIES ###
    // ## insert reset code
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
}
