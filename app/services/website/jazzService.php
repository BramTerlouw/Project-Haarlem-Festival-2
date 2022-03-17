<?php

namespace Services\Website;
use Repositories\Website\JazzRepository;


class JazzService {

public function getOneEvent($event) {
        $repository = new JazzRepository();
        return $repository->getOneEvent($event);
    }
public function getEvents($event, $date) {
        $repository = new JazzRepository();
        return $repository->getEvents($event, $date);
    }

public function getDates($event) {
    $repository = new JazzRepository();
    return $repository->getDates($event);
    }

public function getArtists($event) {
    $repository = new JazzRepository();
    return $repository->getArtists($event);
    }
}