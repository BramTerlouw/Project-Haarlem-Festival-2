<?php
namespace Controllers\Website;
use Controllers\Controller;
//use Services\Website\CulinaryService;

class PaymentController extends Controller {

    public function index() {
        require __DIR__ . '/../../views/payment/index.php';
    }
    public function ideal() {
        require __DIR__ . '/../../views/payment/ideal.php';
    }
    public function paypal() {
        require __DIR__ . '/../../views/payment/paypal.php';
    }
    public function creditcard() {
        require __DIR__ . '/../../views/payment/creditcard.php';
    }
}
?>