<?php
namespace Controllers;
use Controllers\Controller;
use Services\eventservice;
use Services\culinaryservice;

class EventController extends Controller {
    
    private $eventService;
    private $culinaryService;

    function __construct()
    {
        $this->eventService = new eventservice();
        $this->culinaryService = new culinaryservice();
    }

    public function index() {
        $event = $_GET['event'];
        $datelist = $this->eventService->getDates($event);

        // get the event items
        if (!isset($_GET['Date'])) { 
            $eventlist = $this->eventService->getEvents($event, $datelist[0][0]); }
        else { 
            $eventlist = $this->eventService->getEvents($event, $_GET['Date']); }
        $artistlist = $this->eventService->getArtists($event);
        require __DIR__ . '/../views/' . $event . '/index.php';
    }
    public function restaurants() {
        $restaurantlist = $this->culinaryService->getRestaurants();
        //var_dump($restaurantlist);
        require __DIR__ . '/../views/Culinary/Restaurants.php';
    }

    public function reservationForm() {
        require __DIR__ . '/../views/Culinary/reservationForm.php';
    }
}
?>