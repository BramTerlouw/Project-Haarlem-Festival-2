<?php
namespace Controllers;
use Controllers\Controller;

class HomeController extends Controller {
    public function index() {
        require __DIR__ . '/../views/home/index.php';
    }
}
?>