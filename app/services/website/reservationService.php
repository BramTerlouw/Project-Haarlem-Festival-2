<?php

namespace Services\Website;
use Repositories\Website\ReservationRepository;

class ReservationService {

    private $repository;

    function __construct() {
        $this->repository = new ReservationRepository();
    }
    function InsertReservation($reservation, $id){
        return $this->repository->insertReservation($reservation, $id);
    }
}