<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/userservice.php';

class UserController extends Controller {
    private $userService;

    function __construct()
    {
        $this->userService = new UserService;
    }
    
    public function edit() {
        $model = NULL;
        if (isset($_GET['userName'])) {
            $model = $this->userService->getOne($userName = $_GET['userName']);
        } else {
            $model = $this->userService->getOne($userName = $_SESSION['userName']);
        }

        require __DIR__ . '/../views/user/edit.php';
    }

    public function updateOne() {

        if (isset($_POST['submit'])) {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW); // <-- filter POST

            $userArr = array();
            array_push($userArr, $_POST['userID']);
            array_push($userArr, $_POST['userFullName']);
            array_push($userArr, $_POST['userName']);
            array_push($userArr, $_POST['userBD']);
            array_push($userArr, $_POST['gender']);
            array_push($userArr, $_POST['userAddress']);
            array_push($userArr, $_POST['userPostcode']);
            array_push($userArr, $_POST['userCity']);

            if (isset($_POST['userRole'])) // only send when user has permission
                { array_push($userArr, $_POST['userRole']); }
            else 
                {array_push($userArr, $_SESSION['role']);}

            array_push($userArr, $_POST['userSuperV']);
            array_push($userArr, $_POST['userEmail']);
            array_push($userArr, $_POST['userPhone']);

            $this->userService->updateOne($userArr);
            if (isset($_POST['userRole'])) { // when user has permission, update role
                $_SESSION['role'] = $_POST['userRole'];
            }

            header('Location: /user/edit?userName=' . $_POST['userName']);
        }
    }

    public function insertOne() {
        $this->userService->insertOne();
    }


    public function index() {
        $users = $this->userService->getAll();
        require __DIR__ . '/../views/user/index.php';
    }
}
?>