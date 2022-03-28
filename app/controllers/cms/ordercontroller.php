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
        require __DIR__ . '/../../views/cms/order/view.php';
    }

    // // ## create invoice
    // public function createInvoice() {
    //     if (isset($_POST['invoice'])) {
            
    //         header('Location: /cms/order/view');
    //     }
    // }

    // ## create ticket
    public function createTicket() {
        if (isset($_POST['ticket'])) {
            
            header('Location: /cms/order/view');
        }
    }

    // // invoice in cms
    // public function createInvoice()
    // {
    //     if (isset($_POST['invoice'])) {

    //         $snappy = new Pdf('/usr/local/bin/wkhtmltopdf');
    //         $snappy->generateFromHtml('<h1>Bill</h1><p>You owe me money, dude.</p>', 'test.pdf');
    //         header('Content-Type: application/pdf');
    //         header('Content-Disposition: attachment; filename="file.pdf"');
    //         echo $snappy->getOutput('http://www.github.com');
    //     }
    // }
}
?>