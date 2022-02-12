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

    public function overview() {
        $model = $this->cmsService->getEvent($_GET['event']);
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