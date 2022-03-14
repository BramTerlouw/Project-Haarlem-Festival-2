<?php
namespace Controllers;
use Controllers\Controller;
use Services\eventservice;

class EventController extends Controller {
    
    private $eventService;

    function __construct()
    {
        $this->eventService = new eventservice();
    }

    public function index() {
        $event = $_GET['event'];
        $eventlist = $this->eventService->getEvents($event);
        $artistlist = $this->eventService->getArtists($event);
        require __DIR__ . '/../views/' . $event . '/index.php';
    }
    public function restaurants() {
        require __DIR__ . '/../views/Culinary/Restaurants.php';
    }

    public function reservationForm() {
        require __DIR__ . '/../views/Culinary/reservationForm.php';
    }
}
?>