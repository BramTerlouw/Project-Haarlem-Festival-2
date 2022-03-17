<?php
namespace Controllers\Website;
use Controllers\Controller;
use Services\Website\DanceService;

class DanceController extends Controller {
    
    private $eventService;

    function __construct()
    {
        $this->eventService = new DanceService();
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
        require __DIR__ . '/../../views/' . $event . '/index.php';
    }
}
?>