<?php
namespace Controllers;
use Controllers\Controller;
use Services\eventservice;
// require __DIR__ . '/controller.php';
// require __DIR__ . '/../services/eventservice.php';

class EventController extends Controller {
    
    private $eventService;

    function __construct()
    {
        $this->eventService = new eventservice();
    }

    public function index() {
        $event = $_GET['event'];
        $eventlist = $this->eventService->getEvents($event);
        require __DIR__ . '/../views/' . $event . '/index.php';
    }
}
?>