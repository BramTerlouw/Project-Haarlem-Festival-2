<?php

namespace Services\Cms;
use Repositories\Cms\EventRepository;


class EventService {

    private $repository;
    function __construct() {
        $this->repository = new EventRepository();
    }

    // get event names (nar bar)
    public function getEventNames() {
        return $this->repository->getEventNames();
    }

    // get an event
    public function getOneByName($name) {
        return $this->repository->getOneByName($name);
    }

    // get all dates
    public function getDates($id) {
        return $this->repository->getDates($id);
    }

    // get timespan of event
    public function getTimespan($id) {
        return $this->repository->getTimespan($id);
    }

    // update an event
    public function updateOne($id, $eventName, $eventDesc, $eventStart, $eventEnd) {
        $this->repository->updateOne($id, $eventName, $eventDesc, $eventStart, $eventEnd);
    }
}