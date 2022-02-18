<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/cmsservice.php';

class CmsController extends Controller {
    private $cmsService;

    function __construct()
    {
        $this->cmsService = new CmsService();
    }
    
    public function index() {
        require __DIR__ . '/../views/cms/index.php';
    }

    public function login() {
        require __DIR__ . '/../views/cms/login.php';
    }

    public function eventItem() {
        // $event_Item = $this->cmsService->getEventItem($_GET['id']);
        require __DIR__ . '/../views/cms/EventItem.php';
    }

    public function locations() {
        require __DIR__ . '/../views/cms/location.php';
    }

    public function orders() {
        require __DIR__ . '/../views/cms/order.php';
    }

    public function tickets() {
        require __DIR__ . '/../views/cms/ticket.php';
    }

    public function overview() {
        // get event and list of event items
        $event = $this->cmsService->getEvent($_GET['event']);
        $itemArr = $this->cmsService->getEventItems($event->Event_ID);

        // get list of all locations used
        $locationIDs = [];
        foreach ($itemArr as $item) { array_push($locationIDs, $item->Location_ID); }
        if (sizeof($locationIDs) > 0) {
        $locArr = $this->cmsService->getEventLocations($locationIDs);
        }
        require __DIR__ . '/../views/cms/overview.php';
    }

    public function loginValidation() {
        
        // check for POST var
        if (isset($_POST['submit'])) {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW); // <-- filter POST
            
            // get vars
            $userName = $_POST['inputUsername'];
            $password = $_POST['inputPassword'];
            $rowCount = $this->cmsService->getRowCount($userName, $password);

            // when user exists, set session var and go to home
            if ($rowCount == 1) {
                $_SESSION['logginIn'] = true;
                $_SESSION['userName'] = $userName;
                $_SESSION['role'] = $this->cmsService->getRole($userName);
                header('Location: /cms');
            } else { // give error
                header('location: /cms/login?error=loginfailed');
            }
        }
    }
}
?>