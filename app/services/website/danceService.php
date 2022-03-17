<?php

namespace Services\Website;
use Repositories\Website\DanceRepository;


class DanceService {

public function getOneEvent($event) {
        $repository = new DanceRepository();
        return $repository->getOneEvent($event);
    }
public function getEvents($event, $date) {
        $repository = new DanceRepository();
        return $repository->getEvents($event, $date);
    }

public function getDates($event) {
    $repository = new DanceRepository();
    return $repository->getDates($event);
    }

public function getArtists($event) {
    $repository = new DanceRepository();
    return $repository->getArtists($event);
    }

public function getLocations() {
    $repository = new DanceRepository();
    return $repository->getLocations();
    }    
}