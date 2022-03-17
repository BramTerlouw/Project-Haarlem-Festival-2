<?php

namespace Services\Website;
use Repositories\Website\culinaryRepository;

class CulinaryService {

    public function getRestaurants() {
        $repository = new culinaryRepository();
        return $repository->getRestaurants();
    }

    public function getOne($id) {
        $repository = new culinaryRepository();
        return $repository->getOne($id);
    }
}