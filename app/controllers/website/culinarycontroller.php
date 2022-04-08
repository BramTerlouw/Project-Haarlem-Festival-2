<?php
namespace Controllers\Website;
use Controllers\Controller;
use Services\Website\CulinaryService;

class CulinaryController extends Controller {
    
    private $eventService;
    private $culinaryService;

    function __construct()
    {
        $this->culinaryService = new culinaryservice();
    }


    // ## index function of culinary page
    public function index() {
        $event = $_GET['event'];
        $types = $this->culinaryService->getTypes();
        require __DIR__ . '/../../views/' . $event . '/index.php';
    }


    // ## function to get restaurants, by type if url param is set
    public function restaurants() {
        $types = $this->culinaryService->getTypes();
        
        if (isset($_GET['type'])) {
            $restaurantlist = $this->culinaryService->getManyByType($_GET['type']);
        }
        else
            $restaurantlist = $this->culinaryService->getAll();
        require __DIR__ . '/../../views/Culinary/Restaurants.php';

    }


    // ## load reservation form
    public function reservationForm() {
        $timespan = $this->culinaryService->getTimespan(2);
        $restaurant = $this->culinaryService->getOne($_GET['id']);
        if (isset($_GET['res']))
            $key = array_search($_GET['res'], array_column($_SESSION['reservations'], 'id'));

        if (isset($key))
            $reservation = $_SESSION['reservations'][$key];

        require __DIR__ . '/../../views/Culinary/reservationForm.php';
    }


    // ## fetch slider data
    public function fetchSliderdata(){
        $restaurantlist = $this->culinaryService->getAll();
        echo json_encode($restaurantlist);
    }


    // ## insert reservation
    public function insertReservation() {

        // check for POST var
        if (isset($_POST['submit'])) {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW); // <-- filter POST

            $Date = $_POST['Date'];
            $Time = $_POST['Time'];
            $Amount_Children = $_POST['Amount_Children'];
            $Amount_Adults = $_POST['Amount_Adults'];
        }
    }
}
?>