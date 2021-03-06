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

    // ## update an artist
    public function updateOne() {
        if (isset($_POST['submit'])) {
            
            // filter the post
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW); // <-- filter POST

            // get vars from post
            $name = $_POST['inputArtistName'];
            $desc = $_POST['inputArtistDescription'];
            $type = $_POST['inputArtistType'];
  
            // call update functions
            $this->artistService->updateOne($_GET['id'], $name, $desc, $type);

            header('Location: /cms/artist');
        }
    }

    // ## insert an artist
    public function insertOne() {
        if (isset($_POST['add'])) {
            
            // filter the post
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW); // <-- filter POST

            // get vars from post
            $name = $_POST['inputArtistName'];
            $desc = $_POST['inputArtistDescription'];
            $type = $_POST['inputArtistType'];
  
            // call update functions
            $this->artistService->insertOne($name, $desc, $type);

            header('Location: /cms/artist');
        }
    }

    // ## Delete an artist
    public function deleteOne() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // call update functions
            $this->artistService->deleteOne($id);

            header('Location: /cms/artist');
        }
    }
}
?>
