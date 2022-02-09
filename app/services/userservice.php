<?php
require __DIR__ . '/../repositories/userrepository.php';

class UserService {
    public function getUser() {
        $repository = new UserRepository();
        return $repository->getUser();
    }
    
}