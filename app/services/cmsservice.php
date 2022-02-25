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

    public function getEventItems($id, $date) {
        return $this->repository->getEventItems($id, $date);
    }

    public function getLocations() {
        return $this->repository->getLocations();
    }

    public function getEventLocations($locationArr) {
        return $this->repository->getEventLocations($locationArr);
    }

    public function getEventItem($id) {
        return $this->repository->getEVentItem($id);
    }

    public function getPerformers($id) {
        return $this->repository->getPerformers($id);
    }

    public function getDates($id) {
        return $this->repository->getDates($id);
    }

    public function updateEvent($id, $eventName, $eventDesc, $eventStart, $eventEnd) {
        $this->repository->updateEvent($id, $eventName, $eventDesc, $eventStart, $eventEnd);
    }

    public function getEventNames() {
        return $this->repository->getEventNames();
    }
}