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
    public function confirmation(){
        require __DIR__ . '/../../views/payment/confirmation.php';
    }
    public function InitializeMollie(){
        /*
        * Make sure to disable the display of errors in production code!
        */
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        //require_once __DIR__ . "/../vendor/autoload.php";
        require_once __DIR__ . "/functions.php";

        /*
        * Initialize the Mollie API library with your API key.
        *
        * See: https://www.mollie.com/dashboard/developers/api-keys
        */
        $mollie = new \Mollie\Api\MollieApiClient();
        $mollie->setApiKey("test_Ds3fz4U9vNKxzCfVvVHJT2sgW5ECD8");
    }
    public function createPayment(){
        $payment = $mollie->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => "10.00"
            ],
            "description" => "Order #{$orderID}",
            "redirectUrl" => "payment/confirmation",
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