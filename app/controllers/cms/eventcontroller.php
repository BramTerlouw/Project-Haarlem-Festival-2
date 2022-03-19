<?php

namespace Controllers;
namespace Controllers\Cms;

use Controllers\Controller;
use Services\Cms\EventService;
use Services\Cms\EventItemService;
use Services\Cms\LocationService;
use Services\website\CulinaryService;


class EventController extends Controller{
    private $eventService;
    private $eventItemService;
    private $locationService;
    private $culinaryservice;

    function __construct()
    {
        $this->eventService = new EventService();
        $this->eventItemService = new EventItemService();
        $this->locationService = new LocationService();
        $this->culinaryService = new Culinaryservice();
    }
    

    // ## event overview
    public function index() {
        // arrays with data for the form
        $locationIDs = [];
        $event = $this->eventService->getOne($_GET['event']);

        if ($event->Type == "Reservations") {
            $this->reservationIndex($event);
            return;
        }
        $dateArr = $this->eventService->getDates($event->Event_ID);


        // get the event items
        if (!isset($_GET['date'])) { 
            $itemArr = $this->eventItemService->getMany($event->Event_ID, $dateArr[0][0]); }
        else { 
            $itemArr = $this->eventItemService->getMany($event->Event_ID, $_GET['date']); }

        // get list of all locations used
        foreach ($itemArr as $item) { array_push($locationIDs, $item->Location); }
        if (sizeof($locationIDs) > 0) {
            $locArr = $this->locationService->getManyFromArr($locationIDs); }
        
        
        // require the view
        $eventNames = $this->eventService->getEventNames();
        require __DIR__ . '/../../views/cms/event/index.php';
    }



    public function reservationIndex($event)
    {
        $eventNames = $this->eventService->getEventNames();
        $restaurantlist = $this->culinaryService->getAll();
        //var_dump($restaurantlist);
        require __DIR__ . '/../../views/cms/event/restaurant.php';
    }


    // ## update an event
    public function updateOne() {
        if (isset($_POST['submit'])) {
            
            // filter the post
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW); // <-- filter POST

            // get vars from post
            $eventName = $_POST['eventName'];
            $eventDesc = $_POST['eventDesc'];
            $eventStart = $_POST['EventStart'];
            $eventEnd = $_POST['eventEnd'];

            // call update function
            $this->eventService->updateOne($_GET['id'], $eventName, $eventDesc, $eventStart, $eventEnd);
            header('Location: /cms/event?event=' . $eventName);
        }
    }





    // ### methods for dashboard data
    // ## get all tickets and sells for a event
    public function getDonutData() {
        $data = array();

        $jazzTotal = $this->eventService->getAllTickets(1);
        $jazzSold = $this->eventService->getAllSold(1);
        $danceTotal = $this->eventService->getAllTickets(3);
        $danceSold = $this->eventService->getAllSold(3);

        array_push($data, array('totalJazz' => $jazzTotal, 'totalDance' => $danceTotal, 'jazzSold' => $jazzSold, 'danceSold' => $danceSold));
        echo json_encode($data);
    }
}
?>