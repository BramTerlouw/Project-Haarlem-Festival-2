<?php
namespace Controllers\Website;
use Controllers\Controller;
use Services\Cms\BookingService;
use Services\Website\ReservationService;
use Mollie\Api\Exceptions\ApiException;
use Mollie\Api\MollieApiClient;
use Services\Cms\OrderService; 

class PaymentController extends Controller {

    private $bookingservice;
    private $reservationservice;
    private $orderservice;
    
    function __construct()
    {
        $this->bookingservice = new Bookingservice();
        $this->reservationservice = new ReservationService();
        $this->orderservice = new OrderService();
    }


    // ## index function for payment
    public function index() {
        require __DIR__ . '/../../views/payment/index.php';
    }


    // ## payment method views
    public function ideal() {
        require __DIR__ . '/../../views/payment/ideal.php';
    }
    public function paypal() {
        require __DIR__ . '/../../views/payment/paypal.php';
    }
    public function creditcard() {
        require __DIR__ . '/../../views/payment/creditcard.php';
    }


    // ## confirmation view
    public function confirmation(){
        require __DIR__ . '/../../views/payment/confirmation.php';
        $this->ProcessPayment();
    }


    // ## insert order
    public function insertOrder(){
        $this->orderservice->inserOne();
    }
   
    // ## update payment status
    public function UpdatePaymentStatus($id){
        $this->orderservice->updatePaymentStatus($id);
    }

    public function UpdateOrderUuid($id, $uuid){
        $this->orderservice->UpdateOrderUuid($id, $uuid);
    }

    public function GetOrderByUuid($uuid){
        $this->orderservice->GetOrderByUuid($uuid);
    }



    // ## method to initialze mollie and creating the payment with the corrrect price
    public function InitializeMollie($Pricetotal, $id){

        $mollie = new \Mollie\Api\MollieApiClient();
        $mollie->setApiKey("test_Ds3fz4U9vNKxzCfVvVHJT2sgW5ECD8");
       //var_dump($_SERVER["HTTP_ORIGIN"] . "/hf/payment/confirmation");
       //var_dump($_SERVER["HTTP_ORIGIN"]);
        try {
            
            $payment = $mollie->payments->create([
                "amount" => [
                    "currency" => "EUR",
                    "value" => number_format((float)$Pricetotal, 2, '.', '')
                ],
                "description" => "Order #{$id}",
                "redirectUrl" => $_SERVER["HTTP_ORIGIN"] . "/hf/payment/confirmation",
                "webhookUrl" => $_SERVER["HTTP_ORIGIN"] . "/hf/payment/ProcessPayment",
                "metadata" => [
                    "order_id" => $id,
                ],
            ]);
    
            $this->UpdateOrderUuid($id, $payment->id);
            
            header("Location: " . $payment->getCheckoutUrl(), true, 303);

        } catch (\Mollie\Api\Exceptions\ApiException $e) {
            echo "API call failed: " . htmlspecialchars($e->getMessage());
        }
    
    }


    // ## Method for checking of the payment is paid
    // ## Calling the method for updating the payment status to paid
    public function ProcessPayment(){
        $mollie = new \Mollie\Api\MollieApiClient();
        $mollie->setApiKey("test_Ds3fz4U9vNKxzCfVvVHJT2sgW5ECD8");
        //$mollie_payment_ID = $_POST["id"];
        file_put_contents(dirname(__DIR__, 2) . "/mollielogs.txt", $_POST["id"], FILE_APPEND);
    
        try {
            $payment = $mollie->payments->get($_POST["id"]);
            
            
            if ($payment->isPaid()) {
                
                $foundOrder = $this->GetOrderByUuid($_POST["id"]);
                file_put_contents(dirname(__DIR__, 2) . "/mollielogs.txt", $foundOrder, FILE_APPEND);
                

                $this->UpdatePaymentStatus($foundOrder["Order_ID"]);
            }

            
        } catch (\Mollie\Api\Exceptions\ApiException $e) {
            // echo "API call failed: " . htmlspecialchars($e->getMessage());
            //file_put_contents(dirname(__DIR__, 2) . "/mollielogs.txt", $e->getMessage(), FILE_APPEND);
        }
    }
}
?>