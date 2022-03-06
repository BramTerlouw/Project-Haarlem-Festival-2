<?php

namespace Controllers;
use Controllers\Controller;
use Services\CmsService;

class CmsController extends Controller {
    private $cmsService;

    function __construct()
    {
        $this->cmsService = new CmsService();
    }
    
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

    public function overview() {
        // get event and list of event items
        $event = $this->cmsService->getEvent($_GET['event']);
        $dateArr = $this->cmsService->getDates($event->Event_ID);

        if (!isset($_GET['date'])) { 
            $itemArr = $this->cmsService->getEventItems($event->Event_ID, $dateArr[0][0]); }
        else { 
            $itemArr = $this->cmsService->getEventItems($event->Event_ID, $_GET['date']); }

        // get list of all locations used
        $locationIDs = [];
        foreach ($itemArr as $item) { array_push($locationIDs, $item->Location); }
        if (sizeof($locationIDs) > 0) {
            $locArr = $this->cmsService->getEventLocations($locationIDs); }
        
        require __DIR__ . '/../views/cms/overview.php';
    }

    public function eventItem() {
        $item = $this->cmsService->getEventItem($_GET['id']);
        $locations = $this->cmsService->getLocations();
        $itemPerformers = $this->cmsService->getPerformers($_GET['id']);
        require __DIR__ . '/../views/cms/EventItem.php';
    }

    public function updateEvent() {
        if (isset($_POST['submit'])) {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW); // <-- filter POST

            $eventName = $_POST['eventName'];
            $eventDesc = $_POST['eventDesc'];
            $eventStart = $_POST['EventStart'];
            $eventEnd = $_POST['eventEnd'];

            $this->cmsService->updateEvent($_GET['id'], $eventName, $eventDesc, $eventStart, $eventEnd);
            header('Location: /cms/overview?event=' . $eventName);
        }
    }

    public function updateEventItem() {
        if (isset($_POST['submit'])) {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW); // <-- filter POST

            $name = $_POST['inputActivityName'];
            $loc = $_POST['inputActivityLocation'];
            $desc = $_POST['inputActivityDesc'];
            $date = $_POST['inputActivityDate'];
            $start = $_POST['inputActivityStart'];
            $end= $_POST['inputActivityEnd'];

            $this->cmsService->updateEventItem($_GET['id'], $name, $loc, $desc, $date, $start, $end);
            header('Location: /cms/eventItem?id=' . $_GET['id']);
        }
    }

    public function getEventNames() {
        return $this->cmsService->getEventNames();
    }
}
?>