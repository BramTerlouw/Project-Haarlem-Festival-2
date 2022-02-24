<?php
require __DIR__ . '/../repositories/userrepository.php';

class UserService {

    private $repository;

    function __construct() {
        $this->repository = new UserRepository();
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

    public function insertOne() {
        $this->repository->insertOne();
    }
    
}