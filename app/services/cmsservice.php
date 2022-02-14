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

    public function getEvent($name) {
        $repository = new CmsRepository();
        return $repository->getEvent($name);
    }

    public function getEventItems($id) {
        $repository = new CmsRepository();
        return $repository->getEventItems($id);
    }
}