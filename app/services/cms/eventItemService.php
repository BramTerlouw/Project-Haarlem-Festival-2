<?php

namespace Services\Cms;

use Repositories\Cms\EventItemRepository;

class EventItemService {
    private $repository;

    function __construct() {
        $this->repository = new EventItemRepository();
    }


    // ## get one event item
    public function getOne($id) {
        return $this->repository->getOne($id);
    }


    // ## get event items
    public function getMany($id, $date) {
        return $this->repository->getMany($id, $date);
    }


    // ## get all tickets for event
    public function getAllTickets($id) {
        return $this->repository->getAllTickets($id);
    }


    // ## get tickets for event item
    public function getManyTickets($id) {
        return $this->repository->getManyTickets($id);
    }


    // ## update event items
    public function updateOne($id, $name, $loc, $desc, $date, $start, $end) {
        $this->repository->updateOne($id, $name, $loc, $desc, $date, $start, $end);
    }


    // ## insert new event item
    public function insertOne($eventItem) {
        return $this->repository->insertOne($eventItem);
    }


    // ## delete event item
    public function deleteOne($id) {
        $this->repository->deleteOne($id);
    }
}