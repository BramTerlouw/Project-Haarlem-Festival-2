<?php

namespace Services\Cms;

use Repositories\Cms\UserRepository;

class UserService {
    private $repository;

    function __construct() {
        $this->repository = new UserRepository();
    }


    // ## get one user
    public function getOne($userName) {
        return $this->repository->getOne($userName);
    }


    // ## get few users
    public function getMany($filter) {
        return $this->repository->getMany($filter);
    }


    // ## get all users
    public function getAll() {
        return $this->repository->getAll();
    }


    // ## update a user
    public function updateOne($userArr, $pwChange) {
        $this->repository->updateOne($userArr, $pwChange);
    }


    // ## insert a user
    public function insertOne($userArr) {
        $this->repository->insertOne($userArr);
    }


    // ## validate a mail
    public function validateEmail($email) {
        return $this->repository->validateEmail($email);
    }


    // ## Delete a user
    public function deleteOne($id) {
        $this->repository->deleteOne($id);
    }


    // ## set password
    public function setPassword($email, $password) {
        $this->repository->setPassword($email, $password);
    }
}