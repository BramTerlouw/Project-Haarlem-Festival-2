<?php
require __DIR__ . '/controller.php';

class JazzController extends Controller {
    public function index() {
        require __DIR__ . '/../views/Jazz/index.php';
    }
}
?>