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
        $this->orderService = new OrderService();
        $this->eventService = new EventService();
    }
    

    // ## index for orders
    public function index() {
        $eventNames = $this->eventService->getEventNames();
        $orderList = $this->orderService->getAll();
        require __DIR__ . '/../../views/cms/order/index.php';
    }
    public function insertOne(){
        $this->orderService->insertOne();
    }
    public function deleteOne(){
        $this->orderService->deleteOne();
    }
    public function updateOne(){
        $this->orderService->updateOne();
    }
}
?>