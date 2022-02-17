<?php
require __DIR__ . '/../repositories/cmsrepository.php';

class CmsService {

    private $repository;

    function __construct() {
        $this->repository = new CmsRepository();
    }

    public function getRowCount($userName, $password) {
        return $this->repository->getRowCount($userName, $password);
    }

    public function getRole($userName) {
        return $this->repository->getRole($userName);
    }

    public function getEvent($name) {
        return $this->repository->getEvent($name);
    }

    public function getEventItems($id) {
        return $this->repository->getEventItems($id);
    }

    public function getEventLocations($locationArr) {
        return $this->repository->getEventLocations($locationArr);
    }

    public function getEventItem($id) {
        return $this->repository->getEVentItem($id);
    }
}