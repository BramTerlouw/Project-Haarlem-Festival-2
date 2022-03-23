<?php
namespace Controllers\Website;
use Controllers\Controller;
//use Services\Website\CulinaryService;

class PaymentController extends Controller {

    public function index() {
        require __DIR__ . '/../../views/payment/index.php';
    }
}
?>