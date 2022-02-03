<?php
require __DIR__ . '/controller.php';

class CmsController extends Controller {
    public function index() {
        require __DIR__ . '/../views/cms/index.php';
    }
}
?>