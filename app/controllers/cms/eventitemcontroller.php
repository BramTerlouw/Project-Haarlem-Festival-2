<?php

namespace Controllers;
namespace Controllers\Cms;

use Services\Cms\EventItemService;
use Services\Cms\EventService;
use Services\Cms\LocationService;
use Services\Cms\ArtistService;
use Services\Cms\LineupService;

use Models\Event_Item;

class EventItemController {
    private $eventItemService;
    private $eventService;
    private $locationService;
    private $artistService;
    private $lineupService;

    function __construct()
    {
        $this->eventItemService = new EventItemService();
        $this->eventService = new EventService();
        $this->locationService = new LocationService();
        $this->artistService = new ArtistService();
        $this->lineupService = new LineupService();
    }
    
    // ## event item overview
    public function index() {
        
        // arrays with data for the form
        $item = $this->eventItemService->getOne($_GET['id']);
        $timespan = $this->eventService->getTimespan($item->Event_ID);
        $locations = $this->locationService->getAll();
        $artists = $this->artistService->getAll();
        $itemArtists = $this->artistService->getMany($_GET['id']);
        
        
        // require the view
        $eventNames = $this->eventService->getEventNames();
        require __DIR__ . '/../../views/cms/EventItem.php';
    }


    // // ## update an event item
    public function updateOne() {
        
        if (isset($_POST['submit'])) {
            
            // filter the post
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW); // <-- filter POST

            // get vars from post
            $name = $_POST['inputActivityName'];
            $loc = $_POST['inputActivityLocation'];
            $desc = $_POST['inputActivityDesc'];
            $date = $_POST['inputActivityDate'];
            $start = $_POST['inputActivityStart'];
            $end= $_POST['inputActivityEnd'];

            // get all performers for the activity
            $eventPerformers = array();
            foreach ($_POST['inputActivityPerformers'] as $performer)
                array_push($eventPerformers, $performer);
               
            // call update functions
            $this->eventItemService->updateOne($_GET['id'], $name, $loc, $desc, $date, $start, $end);
            $this->filterDeleteArr($_GET['id'], $eventPerformers);
            $this->filterUpdaTeArr($_GET['id'], $eventPerformers);

            // return to eventitem screen
            header('Location: /cms/eventItem?id=' . $_GET['id']);
        }
    }



    // // ## filter which new performers update the lineup
    public function filterUpdateArr($eventID, $performerArr) {
        
        // get line up
        $lineup = $this->lineupService->getOne($eventID);
        
        // if performer allready in lineup, delete of updatelist
        foreach ($lineup as $item) {
            foreach ($performerArr as $performer) {
                if ($item->Artist_ID == $performer)
                    unset($performerArr[array_search($performer, $performerArr)]);
            }
        }

        // call update function
        if (sizeof($performerArr) > 0)
            $this->lineupService->updateLineUp($eventID, $performerArr);
    }



    // // ## filter which new performers must be deleten from lineup
    public function filterDeleteArr($eventID, $performerArr) {
        
        // get line up
        $lineup = $this->lineupService->getOne($eventID);
        
        foreach ($lineup as $item) {
            foreach ($performerArr as $performer) {
                if ($item->Artist_ID == $performer)
                    unset($lineup[array_search($item, $lineup)]);
            }
        }

        if (sizeof($lineup) > 0)
            $this->lineupService->deleteLineUp($lineup);
    }

    // // ## add event item view
    public function addEventItem() {

        // ## arrays with data for the data
        $timespan = $this->eventService->getTimespan($_GET['eventID']);
        $performers = $this->artistService->getAll();
        $locations = $this->locationService->getAll();

        // require the view
        $eventNames = $this->eventService->getEventNames();
        require __DIR__ . '/../../views/cms/addEventItem.php';
    }

    // // ## insert event item in db
    public function insertOne() {
        if (isset($_POST['submit'])) {
            
            // filter the post
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW); // <-- filter POST

            // get vars from post
            $item = new Event_Item();
            $item->Name = $_POST['inputActivityName'];
            $item->Description = $_POST['inputActivityDesc'];
            $item->Date = $_POST['inputActivityDate'];
            $item->Start_Time = $_POST['inputActivityStart'];
            $item->Location_ID = $_POST['inputActivityLocation'];
            $item->Ticket_Price = $_POST['inputActivityPrice'];
            $item->End_Time = $_POST['inputActivityEnd'];
            $item->Tickets = $_POST['inputActivityTickets'];
            $item->Event_ID = $_GET['eventID'];

            // get all performers for the activity
            $eventPerformers = array();
            foreach ($_POST['inputActivityPerformers'] as $performer)
                array_push($eventPerformers, $performer);

            // call insert function
            $lastID = $this->eventItemService->insertOne($item);
            $this->lineupService->updateLineUp($lastID, $eventPerformers);
            header('Location: /cms/event?event=' . $_POST['eventName']);
        }
    }


    // // ## delete event item
    public function deleteItem() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $event = $_GET['event'];
            
            $this->eventItemService->deleteOne($id);
            header('Location: /cms/event?event=' . $event);
        }
    }
}
?>