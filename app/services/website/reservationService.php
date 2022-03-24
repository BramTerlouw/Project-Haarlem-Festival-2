<?php

namespace Services\Website;
use Repositories\Website\ReservationRepository;

class ReservationService {

    private $repository;

    function __construct() {
        $this->repository = new ReservationRepository();
    }
    function InsertReservation(){
        $this->repository = new ReservationRepository();
        return $repository->insertReservation();
    }
}