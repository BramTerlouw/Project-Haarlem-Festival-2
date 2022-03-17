<?php

namespace Services;
use Repositories\eventrepository;


class eventservice {

public function getOneEvent($event) {
        $repository = new eventrepository();
        return $repository->getOneEvent($event);
    }
public function getEvents($event, $date) {
        $repository = new eventrepository();
        return $repository->getEvents($event, $date);
    }

public function getDates($event) {
    $repository = new eventrepository();
    return $repository->getDates($event);
    }

public function getArtists($event) {
    $repository = new eventrepository();
    return $repository->getArtists($event);
    }
}