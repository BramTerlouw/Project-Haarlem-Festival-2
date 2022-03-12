<?php
namespace Controllers;
namespace Controllers\Cms;

use Controllers\Controller;
use Services\Cms\UserService;
use Services\Cms\EventService;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class UserController extends Controller {
    private $userService;
    private $eventService;
    
    function __construct()
    {
        $this->userService = new UserService;
        $this->eventService = new EventService();
    }
    

    // ## load index view of users
    public function index() {
        $eventNames = $this->eventService->getEventNames();
        $users = $this->userService->getAll();
        require __DIR__ . '/../../views/cms/user/index.php';
    }


    // load index overview users searched data
    public function search() {
        if (isset($_POST['submit'])) {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW); // <-- filter POST
            $filter = $_POST['searchInput'];

            $eventNames = $this->eventService->getEventNames();
            $users = $this->userService->getMany($filter);
            require __DIR__ . '/../../views/cms/user/index.php';
        }
    }


    // ## edit a user
    public function edit() {
        $model = NULL;
        if (isset($_GET['userName'])) {
            $model = $this->userService->getOne($userName = $_GET['userName']);
        } else {
            $model = $this->userService->getOne($userName = $_SESSION['userName']);
        }

        $eventNames = $this->eventService->getEventNames();
        require __DIR__ . '/../../views/cms/user/edit.php';
    }


    // ## add a user
    public function add() {
        $eventNames = $this->eventService->getEventNames();
        require __DIR__ . '/../../views/cms/user/add.php';
    }


    // ## update a user
    public function updateOne() {

        // check for POST var
        if (isset($_POST['submit'])) {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW); // <-- filter POST

            $userArr = array();
            array_push($userArr, $_POST['userID']);
            array_push($userArr, $_POST['userFullName']);
            array_push($userArr, $_POST['userName']);
            array_push($userArr, $_POST['userPw']);
            array_push($userArr, $_POST['userBD']);
            array_push($userArr, $_POST['gender']);
            array_push($userArr, $_POST['userAddress']);
            array_push($userArr, $_POST['userPostcode']);
            array_push($userArr, $_POST['userCity']);

            if (isset($_POST['userRole'])) // only send when user has permission
                { array_push($userArr, $_POST['userRole']); }
            else 
                {array_push($userArr, $_SESSION['role']->value);}

            array_push($userArr, $_POST['userSuperV']);
            array_push($userArr, $_POST['userEmail']);
            array_push($userArr, $_POST['userPhone']);

            $this->userService->updateOne($userArr);
            if (isset($_POST['userRole']) && $_POST['userName'] == $_SESSION['userName']) { 
                // when user has permission, update role
                $this->setPermission($_POST['userRole']);
            }
            header('Location: /cms/user');
        }
    }


    // ## insert a new user
    public function insertOne() {

        // check for POST var
        if (isset($_POST['submit'])) {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW); // <-- filter POST

            $userArr = array();
            array_push($userArr, $_POST['userFullName']);
            array_push($userArr, $_POST['userName']);

            // $pw = $_POST['userPw'];
            // $hash = password_hash($pw, PASSWORD_DEFAULT);
            // array_push($userArr, $hash);
            // !!!!!! adjust update one for the hash !!!!!!
            array_push($userArr, $_POST['userPw']);

            array_push($userArr, $_POST['userBD']);
            array_push($userArr, $_POST['gender']);
            array_push($userArr, $_POST['userAddress']);
            array_push($userArr, $_POST['userPostcode']);
            array_push($userArr, $_POST['userCity']);
            array_push($userArr, $_POST['userRole']);
            array_push($userArr, $_POST['userSuperV']);
            array_push($userArr, $_POST['userEmail']);
            array_push($userArr, $_POST['userPhone']);

            if ($_POST['userPw'] == $_POST['userConfirmPw']) {
                $this->userService->insertOne($userArr);   
            }
        }
    }


    // ## delete a user
    public function deleteOne() {
        $this->userService->deleteOne($_GET['id']);
    }


    // ## set the new password
    public function setPassword() {
        if (isset($_POST['submit'])) {
            if ($_POST['inputPassword'] == $_POST['inputPassword']) {
                $this->userService->setPassword($_GET['email'], $_POST['inputPassword']);
            }
        }
    }
}
?>