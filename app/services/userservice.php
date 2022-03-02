<?php

namespace Services;
use Repositories\UserRepository;

class UserService {

    private $repository;

    function __construct() {
        $this->repository = new UserRepository();
    }



    // temporary login
    public function getRowCount($userName, $password) {
        return $this->repository->getRowCount($userName, $password);
    }

    // public function getCredentials($userName) {
    //     return $this->repository->getCredentials($userName);
    // }



    // get the role of logged user for example
    public function getRole($userName) {
        return $this->repository->getRole($userName);
    }



    // get one user
    public function getOne($userName) {
        return $this->repository->getOne($userName);
    }



    // get all users
    public function getAll() {
        return $this->repository->getAll();
    }



    // update a user
    public function updateOne($userArr) {
        $this->repository->updateOne($userArr);
    }



    // insert a user
    public function insertOne($userArr) {
        $this->repository->insertOne($userArr);
    }

    public function validateEmail($email) {
        return $this->repository->validateEmail($email);
    }



    // Delete a user
    public function deleteOne($id) {
        $this->repository->deleteOne($id);
    }



    // get all event names for nav
    public function getEventNames() {
        return $this->repository->getEventNames();
    }



    // reset password
    public function setResetCode($email, $code) {
        $this->repository->setResetCode($email, $code);
    }

    public function getResetMail($code) {
        return $this->repository->getResetMail($code);
    }

    public function setPassword($email, $password) {
        $this->repository->setPassword($email, $password);
    }
}