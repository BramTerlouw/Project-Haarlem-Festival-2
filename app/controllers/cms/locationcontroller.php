<?php

namespace Controllers;
namespace Controllers\Cms;

use Services\Cms\LocationService;
use Services\Cms\EventService;

class LocationController {
    private $locationService;
    private $eventService;
    
    function __construct()
    {
        $this->locationService = new LocationService();
        $this->eventService = new EventService();
    }
    

    // ## index for locations
    public function index() {
        $eventNames = $this->eventService->getEventNames();
        require __DIR__ . '/../../views/cms/location/index.php';
    }
}
?>