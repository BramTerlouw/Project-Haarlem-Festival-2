<?php

namespace Services;
use Repositories\CmsRepository;


class CmsService {

    private $repository;
    function __construct() {
        $this->repository = new CmsRepository();
    }



    // get an event
    public function getEvent($name) {
        return $this->repository->getEvent($name);
    }



    // get event items
    public function getEventItems($id, $date) {
        return $this->repository->getEventItems($id, $date);
    }



    // get locations
    public function getLocations() {
        return $this->repository->getLocations();
    }



    // get locations for event
    public function getEventLocations($locationArr) {
        return $this->repository->getEventLocations($locationArr);
    }



    // get specific event item
    public function getEventItem($id) {
        return $this->repository->getEVentItem($id);
    }



    // get specific performers for event
    public function getItemPerformers($id) {
        return $this->repository->getItemPerformers($id);
    }



    // get all performers
    public function getAllPerformers() {
        return $this->repository->getAllPerformers();
    }



    // get all dates
    public function getDates($id) {
        return $this->repository->getDates($id);
    }


    // get timespan of event
    public function getEventTimespan($id) {
        return $this->repository->getEventTimespan($id);
    }



    // update an event
    public function updateEvent($id, $eventName, $eventDesc, $eventStart, $eventEnd) {
        $this->repository->updateEvent($id, $eventName, $eventDesc, $eventStart, $eventEnd);
    }



    // update event items
    public function updateEventItem($id, $name, $loc, $desc, $date, $start, $end) {
        $this->repository->updateEventItem($id, $name, $loc, $desc, $date, $start, $end);
    }



    // update lineup
    public function updateLineUp($eventID, $performerID) {
        $this->repository->updateLineUp($eventID, $performerID);
    }



    // get line up
    public function getLineUp($id) {
        return $this->repository->getLineUp($id);
    }



    // delete line up item
    public function deleteLineUp($lineupID) {
        $this->repository->deleteLineUp($lineupID);
    }


    // get event names (nar bar)
    public function getEventNames() {
        return $this->repository->getEventNames();
    }


    // insert new event item
    public function insertEventItem($eventItem) {
        return $this->repository->insertEventItem($eventItem);
    }


    // delete event item
    public function deleteEventItem($id) {
        $this->repository->deleteEventItem($id);
    } 
}