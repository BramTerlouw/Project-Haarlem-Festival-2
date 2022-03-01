<?php
require __DIR__ . '/../repositories/userrepository.php';

class UserService {

    private $repository;

    function __construct() {
        $this->repository = new UserRepository();
    }

    public function getRowCount($userName, $password) {
        return $this->repository->getRowCount($userName, $password);
    }

    // public function getCredentials($userName) {
    //     return $this->repository->getCredentials($userName);
    // }

    public function getRole($userName) {
        return $this->repository->getRole($userName);
    }

    public function getOne($userName) {
        return $this->repository->getOne($userName);
    }

    public function getAll() {
        return $this->repository->getAll();
    }

    public function updateOne($userArr) {
        $this->repository->updateOne($userArr);
    }

    public function insertOne($userArr) {
        $this->repository->insertOne($userArr);
    }

    public function deleteOne($id) {
        $this->repository->deleteOne($id);
    }

    public function getEventNames() {
        return $this->repository->getEventNames();
    }
    
}