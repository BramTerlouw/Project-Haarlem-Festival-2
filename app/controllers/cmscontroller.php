<?php

namespace Controllers;
use Controllers\Controller;
use Services\CmsService;

class CmsController extends Controller {
    
    // service var and constructor
    private $service;
    function __construct()
    {
        $this->service = new CmsService();
    }


    // require the cms views 
    public function index() {
        require __DIR__ . '/../views/cms/index.php';
    }
    public function login() {
        require __DIR__ . '/../views/cms/login.php';
    }
    public function logout() {
        session_destroy();
        header('Location: /');
    }
    public function locations() {
        require __DIR__ . '/../views/cms/location.php';
    }
    public function orders() {
        require __DIR__ . '/../views/cms/order.php';
    }
    public function tickets() {
        require __DIR__ . '/../views/cms/ticket.php';
    }



    // ## event overview
    public function overview() {

        // arrays with data for the form
        $locationIDs = [];
        $event = $this->service->getEvent($_GET['event']);
        $dateArr = $this->service->getDates($event->Event_ID);


        // get the event items
        if (!isset($_GET['date'])) { 
            $itemArr = $this->service->getEventItems($event->Event_ID, $dateArr[0][0]); }
        else { 
            $itemArr = $this->service->getEventItems($event->Event_ID, $_GET['date']); }


        // get list of all locations used
        foreach ($itemArr as $item) { array_push($locationIDs, $item->Location); }
        if (sizeof($locationIDs) > 0) {
            $locArr = $this->service->getEventLocations($locationIDs); }
        
        
        // require the view
        require __DIR__ . '/../views/cms/overview.php';
    }



    // ## event item overview
    public function eventItem() {
        
        // arrays with data for the form
        $item = $this->service->getEventItem($_GET['id']);
        $locations = $this->service->getLocations();
        $performers = $this->service->getAllPerformers();
        $itemPerformers = $this->service->getItemPerformers($_GET['id']);
        
        
        // require the view
        require __DIR__ . '/../views/cms/EventItem.php';
    }



    // ## update an event
    public function updateEvent() {
        if (isset($_POST['submit'])) {
            
            // filter the post
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW); // <-- filter POST

            // get vars from post
            $eventName = $_POST['eventName'];
            $eventDesc = $_POST['eventDesc'];
            $eventStart = $_POST['EventStart'];
            $eventEnd = $_POST['eventEnd'];

            // call update functions
            $this->service->updateEvent($_GET['id'], $eventName, $eventDesc, $eventStart, $eventEnd);
            header('Location: /cms/overview?event=' . $eventName);
        }
    }



    // ## update an event item
    public function updateEventItem() {
        
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
            $this->service->updateEventItem($_GET['id'], $name, $loc, $desc, $date, $start, $end);
            $this->filterPerformerArr($_GET['id'], $eventPerformers);

            // return to eventitem screen
            header('Location: /cms/eventItem?id=' . $_GET['id']);
        }
    }



    // filter array of given performers
    public function filterPerformerArr($eventID, $performerArr) {
        
        // get line up
        $lineup = $this->service->getLineUp();
        
        // if performer allready in lineup, delete of updatelist
        foreach ($lineup as $item) {
            foreach ($performerArr as $performer) {
                if ($item->EventItem_ID == $eventID && $item->Artist_ID == $performer)
                    unset($performerArr[array_search($performer, $performerArr)]);
            }
        }

        // call update function
        $this->updateLineUp($eventID, $performerArr);
    }



    // ## update line up
    private function updateLineUp($eventID, $performerArr) {
        foreach ($performerArr as $performer) {
            $this->service->updateLineUp($eventID, $performer);
        }
    }



    // ## get event names for navbar
    public function getEventNames() {
        return $this->service->getEventNames();
    }
}
?>