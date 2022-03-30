<?php

namespace Services\Cms;

use Repositories\Cms\OrderRepository;

class OrderService {
    private $repository;
    
    function __construct() {
        $this->repository = new OrderRepository();
    }

    // ## get orders
    public function getAll() {
        return $this->repository->getAll();
    }

    public function getOne($order_id) {
        return $this->repository->getOne($order_id);
    }

}