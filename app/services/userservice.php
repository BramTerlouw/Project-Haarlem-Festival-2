<?php
require __DIR__ . '/../repositories/userrepository.php';

class UserService {
    public function getPersonalInfo() {
        $repository = new UserRepository();
        return $repository->getPersonalInfo();
    }
    
}