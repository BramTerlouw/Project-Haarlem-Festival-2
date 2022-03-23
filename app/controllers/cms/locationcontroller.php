<?php

namespace Controllers;
namespace Controllers\Cms;

use Services\Cms\LocationService;
use Services\Cms\EventService;

class LocationController {
    private $locationService;
    private $eventService;
    
    function __construct()
    {
        $this->locationService = new LocationService();
        $this->eventService = new EventService();
    }
    

    // ## index for locations
    public function index() {
        $eventNames = $this->eventService->getEventNames();
        $locationList = $this->locationService->getAll();
        require __DIR__ . '/../../views/cms/location/index.php';
    }

    // ## update a location
    public function updateOne() {
        if (isset($_POST['submit'])) {
            
            // filter the post
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW); // <-- filter POST

            // get vars from post
            $name = $_POST['inputLocationName'];
            $address = $_POST['inputLocationAddress'];
  
            // call update functions
            $this->locationService->updateOne($_GET['id'], $name, $address);

            header('Location: /cms/location');
        }
    }

    // ## insert a location
    public function insertOne() {
        if (isset($_POST['add'])) {
            
            // filter the post
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW); // <-- filter POST

            // get vars from post
            $name = $_POST['inputLocationName'];
            $address = $_POST['inputLocationAddress'];
  
            // call update functions
            $this->locationService->insertOne($name, $address);

            header('Location: /cms/location');
        }
    }

    // ## Delete a location
    public function deleteOne() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // call update functions
            $this->locationService->deleteOne($id);

            header('Location: /cms/location');
        }
    }
}
?>