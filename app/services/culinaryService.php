<?php

namespace Services;
use Repositories\culinaryRepository;

class CulinaryService {

    public function getRestaurants() {
        $repository = new CulinaryRepository();
        return $repository->getRestaurants();
    }

    public function getOne($id) {
        $repository = new CulinaryRepository();
        return $repository->getOne($id);
    }
}