<?php

namespace Services\Cms;

use Repositories\Cms\RestaurantRepository;

class RestaurantService {
    private $repository;
    
    function __construct() {
        $this->repository = new RestaurantRepository();
    }

    public function getAll() {
        return $this->repository->getAll();
    }


    public function getOne($id) {
        return $this->repository->getOne($id);
    }
}