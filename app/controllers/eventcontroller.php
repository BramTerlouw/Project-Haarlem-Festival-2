<?php
require __DIR__ . '/controller.php';

class EventController extends Controller {
    
    public function index() {
        $event = $_GET['event'];
        require __DIR__ . '/../views/' . $event . '/index.php';
    }
}
?>