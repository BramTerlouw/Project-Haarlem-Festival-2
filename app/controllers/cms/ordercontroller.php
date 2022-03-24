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

    // ## view an order
    public function view() {
        $eventNames = $this->eventService->getEventNames();
        $orderList = $this->orderService->getAll();
        require __DIR__ . '/../../views/cms/order/view.php';
    }

    // ## create invoice
    public function createInvoice() {
        if (isset($_POST['invoice'])) {
            
            header('Location: /cms/order/view');
        }
    }

    // ## create ticket
    public function createTicket() {
        if (isset($_POST['ticket'])) {
            
            header('Location: /cms/order/view');
        }
    }
}
?>