<?php

namespace Services\Website;
use Repositories\Website\culinaryRepository;

class CulinaryService {

    private $repository;

    function __construct() {
        $this->repository = new culinaryRepository();
    }


    // ## get all restaurants
    public function getAll() {
        return $this->repository->getAll();
    }


    // ## get restaurants by type
    public function getManyByType($type) {
        return $this->repository->getManyByType($type);
    }


    // get restaurants from arr
    public function getManyFromArr() {
        return $this->repository->getManyFromArr();
    }


    // ## get one restaurant
    public function getOne($id) {
        return $this->repository->getOne($id);
    }


    // ## get timespan
    public function getTimespan($id) {
        return $this->repository->getTimespan($id);
    }


    // ## get all types
    public function getTypes() {
        return $this->repository->getTypes();
    }
}