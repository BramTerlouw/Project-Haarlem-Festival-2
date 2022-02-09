<?php
require __DIR__ . '/../repositories/cmsrepository.php';

class CmsService {

    public function getUserCredentials($userName, $password) {
        // create repository
        $repository = new CmsRepository();
        return $repository->getUserCredentials($userName, $password);
    }
}