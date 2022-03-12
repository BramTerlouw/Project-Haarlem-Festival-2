<?php

namespace Controllers;
namespace Controllers\Cms;

use Services\Cms\OrderService;
use Services\Cms\EventService;

class OrderController {
    
    private $orderService;
    private $eventService;
    function __construct()
    {
        $this->locationService = new OrderService();
        $this->eventService = new EventService();
    }
    

    // ## index for orders
    public function index() {
        $eventNames = $this->eventService->getEventNames();
        require __DIR__ . '/../../views/cms/order/index.php';
    }
}
?>