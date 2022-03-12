<?php

namespace Services\Cms;

use Repositories\Cms\AuthRepository;

class AuthService {
    private $repository;

    function __construct() {
        $this->repository = new AuthRepository();
    }

    // ## temporary login
    public function getRowCount($userName, $password) {
        return $this->repository->getRowCount($userName, $password);
    }


    // public function getCredentials($userName) {
    //     return $this->repository->getCredentials($userName);
    // }


    // ## get the role of logged user for example
    public function getRole($userName) {
        return $this->repository->getRole($userName);
    }


    // ## reset password
    public function setResetCode($email, $code) {
        $this->repository->setResetCode($email, $code);
    }


    // ## get reset mail
    public function getResetMail($code) {
        return $this->repository->getResetMail($code);
    }
}