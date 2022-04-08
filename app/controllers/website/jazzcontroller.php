<?php
namespace Controllers\Website;
use Controllers\Controller;
use Services\Website\JazzService;

class JazzController extends Controller {
    
    private $jazzService;
    function __construct()
    {
        $this->jazzService = new JazzService();
    }


    // ## index function for jazz
    public function index() {
        $event = $_GET['event'];
        require __DIR__ . '/../../views/' . $event . '/index.php';
    }
}
?>