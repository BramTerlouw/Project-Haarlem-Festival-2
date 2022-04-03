<?php

namespace Services\Website;

use Repositories\Website\DanceRepository;


class DanceService
{


    // Get one event 
    public function getOneEvent($event)
    {
        $repository = new DanceRepository();
        return $repository->getOneEvent($event);
    }


    // Get events by date 
    public function getEvents($event, $date)
    {
        $repository = new DanceRepository();
        return $repository->getEvents($event, $date);
    }


    // Get dates by event
    public function getDates($event)
    {
        $repository = new DanceRepository();
        return $repository->getDates($event);
    }

    // Get artists by event
    public function getArtists($event)
    {
        $repository = new DanceRepository();
        return $repository->getArtists($event);
    }


    // Get locations
    public function getLocations()
    {
        $repository = new DanceRepository();
        return $repository->getLocations();
    }
}
