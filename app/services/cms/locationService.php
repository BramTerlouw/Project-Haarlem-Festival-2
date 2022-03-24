<?php

namespace Services\Cms; 

use Repositories\Cms\LocationRepository;

class LocationService {
    private $repository;

    function __construct() {
        $this->repository = new LocationRepository();
    }


    // ## get locations
    public function getAll() {
        return $this->repository->getAll();
    }


    // ## get locations for event
    public function getManyFromArr($locationArr) {
        return $this->repository->getManyFromArr($locationArr);
    }

    // ## update location
    public function updateOne($id, $name, $address) {
        $this->repository->updateOne($id, $name, $address);
    }

    // ## insert location
    public function insertOne($name, $address) {
        $this->repository->insertOne($name, $address);
    }

    // ## delete location
    public function deleteOne($id) {
        $this->repository->deleteOne($id);
    }
}