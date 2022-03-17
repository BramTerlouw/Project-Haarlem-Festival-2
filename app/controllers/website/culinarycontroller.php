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

    public function index() {
        $event = $_GET['event'];
        require __DIR__ . '/../../views/' . $event . '/index.php';
    }

    public function restaurants() {
        $restaurantlist = $this->culinaryService->getRestaurants();
        //var_dump($restaurantlist);
        require __DIR__ . '/../../views/Culinary/Restaurants.php';

    }
    public function reservationForm() {
        require __DIR__ . '/../../views/Culinary/reservationForm.php';
    }

    public function fetchSliderdata(){
        $restaurantlist = $this->culinaryService->getRestaurants();
        echo json_encode($restaurantlist);

    }
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