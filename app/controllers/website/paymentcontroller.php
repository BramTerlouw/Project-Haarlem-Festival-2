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
    public function createPayment(){

        $mollie = new '\vendor\Mollie\Api\MollieApiClient()';
        $mollie->setApiKey("test_Ds3fz4U9vNKxzCfVvVHJT2sgW5ECD8");

        $payment = $mollie->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => "10.00"
            ],
            "description" => "Order #{$orderID}",
            "redirectUrl" => "",
            "webhookUrl"  => "",
            "metadata" => [
                "order_id" => $orderID,
            ],
        ]);

    }
    public function RecievePayement(){
        $payment = $mollie->payments->get($payment->id);

        if ($payment->isPaid())
        {
            echo "Payment received.";
        }

        

    }

    public function insertOrder(){





    }
    public function insertBooking($order){




        
    }
    public function insertReservation($order){




        
    }






}
?>