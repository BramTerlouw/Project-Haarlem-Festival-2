<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/userservice.php';

class UserController extends Controller {
    private $userService;

    function __construct()
    {
        $this->userService = new UserService;
    }
    
    public function personal() {
        $model = $this->userService->getOne();
        require __DIR__ . '/../views/user/personal.php';
    }

    public function index() {
        $users = $this->userService->getAll();
        require __DIR__ . '/../views/user/index.php';
    }
}
?>