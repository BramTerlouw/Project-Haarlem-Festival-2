<?php
namespace Services;
use Repositories\eventrepository;
// require __DIR__ . '/../repositories/eventrepository.php';

class eventservice {

public function getEvents($event) {
        $repository = new eventrepository();
        return $repository->getEvents($event);
    }
}