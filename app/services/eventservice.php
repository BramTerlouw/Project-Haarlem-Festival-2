<?php

namespace Services;
use Repositories\eventrepository;


class eventservice {

public function getEvents($event) {
        $repository = new eventrepository();
        return $repository->getEvents($event);
    }

public function getArtists($event) {
    $repository = new eventrepository();
    return $repository->getArtists($event);
    }
}