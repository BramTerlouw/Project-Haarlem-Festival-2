<?php

namespace Controllers;
namespace Controllers\Cms;

use Services\Cms\OrderService;
use Services\Cms\EventService;
use Knp\Snappy\Pdf;

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

    // ## view an order
    public function view() {
        $eventNames = $this->eventService->getEventNames();
        $orderList = $this->orderService->getAll();
        $order_id = $_GET['order_id'];
        $orderData = $this->orderService->getOne($order_id);
        require __DIR__ . '/../../views/cms/order/view.php';
    }
    
}
?>