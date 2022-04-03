<?php

namespace Controllers;
namespace Controllers\Cms;

use Services\Cms\BookingService;
use Services\Cms\EventService;

class BookingController {
    
    private $bookingService;
    private $eventService;
    
    function __construct()
    {
        $this->bookingService = new BookingService();
        $this->eventService = new EventService();
    }
    

    // ## index for bookings
    public function index() {
        $eventNames = $this->eventService->getEventNames();
        $Qr_Code_ID = $_GET['Qr_Code_ID'];
        $this->bookingService->updateIsScanned($Qr_Code_ID);
        require __DIR__ . '/../../views/cms/order/index.php';
    }

    // ## view an order
    public function view() {
        $eventNames = $this->eventService->getEventNames();
        $order_id = $_GET['order_id'];
        $bookingData = $this->bookingService->getOne($order_id);
        require __DIR__ . '/../../views/cms/order/view.php';
    }
    
}
?>