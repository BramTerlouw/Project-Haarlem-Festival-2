<?php
require __DIR__ . '/../repositories/userrepository.php';

class UserService {

    private $repository;

    function __construct() {
        $this->repository = new UserRepository();
    }
    public function getOne() {
        return $this->repository->getOne();
    }

    public function getAll() {
        return $this->repository->getAll();
    }
    
}