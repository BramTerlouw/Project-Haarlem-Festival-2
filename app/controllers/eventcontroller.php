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
        $dateList = $this->eventService->getDates($event);
        $eventList = $this->eventService->getOneEvent($event);


        // get the event items
        if (!isset($_GET['Date'])) { 
            $eventItemList = $this->eventService->getEvents($event, $dateList[0][0]); 
        }
        else { 
            $eventItemList = $this->eventService->getEvents($event, $_GET['Date']); 
        }


        $artistList = $this->eventService->getArtists($event);
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