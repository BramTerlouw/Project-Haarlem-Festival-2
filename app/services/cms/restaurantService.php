<?php

namespace Services\Cms;

use Repositories\Cms\RestaurantRepository;

class RestaurantService {
    private $repository;
    
    function __construct() {
        $this->repository = new RestaurantRepository();
    }


    // ## get all restaurants
    public function getAll() {
        return $this->repository->getAll();
    }


    // ## get one restaurant
    public function getOne($id) {
        return $this->repository->getOne($id);
    }


    // ## insert one restaurant
    public function insertOne($restaurant) {
        $this->repository->insertOne($restaurant);
    }


    // ## update one restaurant
    public function updateOne($Restaurant) {
        $this->repository->updateOne($Restaurant);
    }
    

    // ## delete one restaurant
    public function deleteOne($id) {
        $this->repository->deleteOne($id);
    }


    // ## update status of one restaurant
    public function updateStatus($status, $id) {
        $this->repository->updateStatus($status, $id);
    }
}