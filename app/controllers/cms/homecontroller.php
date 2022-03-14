<?php

namespace Controllers;
namespace Controllers\Cms;

use Controllers\Controller;
use Services\Cms\EventService;

class HomeController extends Controller{
    private $eventService;

    function __construct()
    {
        $this->eventService = new EventService();
    }
    

    // ## index for dashboard
    public function index() {
        $eventNames = $this->eventService->getEventNames();
        require __DIR__ . '/../../views/cms/index.php';
    }
}
?>