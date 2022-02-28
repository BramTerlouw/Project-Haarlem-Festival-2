<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/danceservice.php';

class EventController extends Controller {
    
    private $danceService;

    function __construct()
    {
        $this->danceService = new danceservice();
    }

    public function index() {
        $event = $_GET['event'];
        $eventlist = $this->danceService->getDanceEvents();
        require __DIR__ . '/../views/' . $event . '/index.php';
    }
}
?>