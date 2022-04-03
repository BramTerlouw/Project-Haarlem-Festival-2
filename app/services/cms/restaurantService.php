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


    public function insertOne($restaurant) {
        $this->repository->insertOne($restaurant);
    }


    public function updateOne($Restaurant) {
        $this->repository->updateOne($Restaurant);
    }
    

    public function deleteOne($id) {
        $this->repository->deleteOne($id);
    }


    public function updateStatus($status, $id) {
        $this->repository->updateStatus($status, $id);
    }
}