<?php

namespace Services\Cms;

use Repositories\Cms\BookingRepository;

class BookingService {
    private $repository;
    
    function __construct() {
        $this->repository = new BookingRepository();
    }

    // ## get bookings

    public function getOne($order_id) {
        return $this->repository->getOne($order_id);
    }

}