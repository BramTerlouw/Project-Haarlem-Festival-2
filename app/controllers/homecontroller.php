<?php
namespace Controllers;
use Controllers\Controller;
// require __DIR__ . '/controller.php';

class HomeController extends Controller {
    public function index() {
        require __DIR__ . '/../views/home/index.php';
    }
}
?>