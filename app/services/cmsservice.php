<?php
require __DIR__ . '/../repositories/cmsrepository.php';

class CmsService {

    public function getRowCount($userName, $password) {
        $repository = new CmsRepository();
        return $repository->getRowCount($userName, $password);
    }

    public function getRole($userName) {
        $repository = new CmsRepository();
        return $repository->getRole($userName);
    }
}