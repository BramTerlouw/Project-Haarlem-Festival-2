<?php

namespace Controllers;
namespace Controllers\Cms;

use Controllers\Controller;
use Services\Cms\ArtistService;
use Services\Cms\EventService;

class ArtistController extends Controller{
    
    private $artistService;
    private $eventService;
    function __construct()
    {
        $this->artistService = new ArtistService();
        $this->eventService = new EventService();
    }

    // ## index for artists
    public function index() {
        $eventNames = $this->eventService->getEventNames();
        $artistList = $this->artistService->getAll();
        require __DIR__ . '/../../views/cms/artist/index.php';
    }
}
?>