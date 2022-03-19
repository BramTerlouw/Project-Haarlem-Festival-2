<?php

namespace Services\Website;
use Repositories\Website\culinaryRepository;

class CulinaryService {

    private $repository;

    function __construct() {
        $this->repository = new culinaryRepository();
    }

    public function getRestaurants() {
        return $this->repository->getRestaurants();
    }

    public function getRestaurantsByType($type) {
        return $this->repository->getRestaurantsByType($type);
    }

    public function getOne($id) {
        return $this->repository->getOne($id);
    }

    public function getTimespan($id) {
        return $this->repository->getTimespan($id);
    }
    public function getTypes() {
        return $this->repository->getTypes();
    }
}