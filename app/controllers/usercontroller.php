<?php
require __DIR__ . '/controller.php';

class UserController extends Controller {
    public function personal() {
        require __DIR__ . '/../views/user/personal.php';
    }
}
?>