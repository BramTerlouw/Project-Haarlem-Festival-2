<?php

namespace Controllers;
namespace Controllers\Cms;

use Services\Cms\RestaurantService;
use Services\Cms\EventService;

use Models\Event_Item;
use Models\Restaurant;

class RestaurantController {
    private $restaurantService;
    private $eventService;

    function __construct()
    {
        $this->restaurantService = new RestaurantService();
        $this->eventService = new EventService();
    }

    public function index() {
        $eventNames = $this->eventService->getEventNames();
        $restaurant = $this->restaurantService->getOne($_GET['id']);
        require __DIR__ . '/../../views/cms/restaurant/index.php';
    }


    public function add() {
        $eventNames = $this->eventService->getEventNames();
        require __DIR__ . '/../../views/cms/restaurant/add.php';
    }

    public function addRestaurant() {
        if (isset($_POST['submit'])) {
            $newRestaurant = new Restaurant();
            $newRestaurant->Name = $_POST['inputRestaurantName'];
            $newRestaurant->Type = $_POST['inputRestaurantType'];
            $newRestaurant->Summary = $_POST['inputRestaurantDesc'];
            $newRestaurant->Max_visitors = $_POST['inputRestaurantMax'];
            $newRestaurant->Wheelchair_accessible = $_POST['inputRestaurantAccess'];
            $newRestaurant->Price_Adults = $_POST['inputRestaurantPrice'];
            $newRestaurant->Price_Children = $_POST['inputRestaurantPriceChild'];
            $newRestaurant->Adres = $_POST['inputRestaurantAddress'];
            $newRestaurant->sessions = $_POST['inputRestaurantSessions'];
            $newRestaurant->duration = $_POST['inputRestaurantDuration'];
            $newRestaurant->start_time = $_POST['inputRestaurantStart'];
            
            $this->restaurantService->insertOne($newRestaurant);
        }
    }

    public function editRestaurant() {
        if (isset($_POST['submit'])) {
            $newRestaurant = new Restaurant();
            $newRestaurant->Restaurant_ID = $_GET['id'];
            $newRestaurant->Name = $_POST['inputRestaurantName'];
            $newRestaurant->Type = $_POST['inputRestaurantType'];
            $newRestaurant->Summary = $_POST['inputRestaurantDesc'];
            $newRestaurant->Max_visitors = $_POST['inputRestaurantMax'];
            $newRestaurant->Wheelchair_accessible = $_POST['inputRestaurantAccess'];
            $newRestaurant->Price_Adults = $_POST['inputRestaurantPrice'];
            $newRestaurant->Price_Children = $_POST['inputRestaurantPriceChild'];
            $newRestaurant->Adres = $_POST['inputRestaurantAddress'];
            $newRestaurant->sessions = $_POST['inputRestaurantSessions'];
            $newRestaurant->duration = $_POST['inputRestaurantDuration'];
            $newRestaurant->start_time = $_POST['inputRestaurantStart'];
            
            $this->restaurantService->updateOne($newRestaurant);
        }
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            
            $this->restaurantService->deleteOne($id);
            header('Location: /cms/event?event=2');
        }
    }


    public function changeStatus() {
        if (isset($_GET['status'])) {
            $status = $_GET['status'];
            echo $status;
        }
    }
    
}
?>