<?php

namespace Services\Website;
use Repositories\Website\BookingRepository;

class BookingService {

    private $repository;

    function __construct() {
        $this->repository = new BookingRepository();
    }
}