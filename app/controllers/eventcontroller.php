<?php
require __DIR__ . '/controller.php';

class EventController extends Controller {
    
    public function index() {
        $event = $_GET['event'];
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