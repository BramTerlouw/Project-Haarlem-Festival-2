<?php

namespace Controllers;
namespace Controllers\Cms;

use Services\Cms\RestaurantService;
use Services\Cms\EventService;

use Models\Event_Item;

class RestaurantController {
    private $restaurantService;
    private $eventService;

    function __construct()
    {
        $this->restaurantService = new RestaurantService();
        $this->eventService = new EventService();
    }

    public function index() {
        $eventNames = $this->eventService->getEventNames();
        require __DIR__ . '/../../views/cms/restaurant/index.php';
    }
    
}
?>