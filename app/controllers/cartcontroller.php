<?php

namespace Controllers;

class CartController extends Controller {
    // private $cmsService;

    // function __construct()
    // {
    //     $this->cmsService = new CmsService();
    // }
    
    public function index() {
        require __DIR__ . '/../views/cart/index.php';
    }
}
?>