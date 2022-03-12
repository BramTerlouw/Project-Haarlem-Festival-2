<?php

namespace Controllers;
namespace Controllers\Website;

class CartController {
    // private $cmsService;

    // function __construct()
    // {
    //     $this->cmsService = new CmsService();
    // }
    
    public function index() {
        require __DIR__ . '/../../views/cart/index.php';
    }
}
?>