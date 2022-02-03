<?php
require __DIR__ . '/controller.php';

class CulinaryController extends Controller {
    public function index() {
        require __DIR__ . '/../views/Culinary/index.php';
    }
}
?>