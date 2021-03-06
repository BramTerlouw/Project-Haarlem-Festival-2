<?php
namespace Controllers\Website;
use Controllers\Controller;
use Services\Cms\BookingService;
use Services\Website\ReservationService;
use Mollie\Api\Exceptions\ApiException;
use Mollie\Api\MollieApiClient;

class PaymentController extends Controller {

    private $bookingservice;
    private $reservationservice;
    
    function __construct()
    {
        $this->bookingservice = new Bookingservice();
        $this->reservationservice = new ReservationService();
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
    // public function insertBooking($order){
    //     $this->bookingservice->insertBooking();
    // }

    // public function insertReservation($order){
    //     $this->reservationservice->insertReservation();
    // }


    // ## update payment status
    public function UpdatePaymentStatus($id){
        $this->orderservice->updatePaymentStatus($id);
    }


    // ## method to initialze mollie and creating the payment with the corrrect price
    public function InitializeMollie($Pricetotal, $id){
        $mollie = new \Mollie\Api\MollieApiClient();
        $mollie->setApiKey("test_Ds3fz4U9vNKxzCfVvVHJT2sgW5ECD8");
        try {
            $payment = $mollie->payments->create([
                  "amount" => [
                        "currency" => "EUR",
                        "value" => number_format((float)$Pricetotal, 2, '.', '') 
                  ],
                  "description" => "Order #{$id}",
                  "redirectUrl" => " http://f9d5-213-127-46-47.ngrok.io/hf/payment/confirmation",
                  "webhookUrl" => "http://f9d5-213-127-46-47.ngrok.io/hf/payment/ProcessPayment",
                  "metadata" => [
                    "order_id" => $id,
                ],
            ]);
    
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
        
        try {
            $payment = $mollie->payments->get($_POST["id"]);
            $id = $payment->metadata->order_id;
            
            if ($payment->isPaid()) {
                //updaten van de payment status
                //UpdatePaymentStatus($id);
                
            } else {
                //return $this->json(["Error" => "Some error Occurred!"]);
            } 
            
        } catch (\Mollie\Api\Exceptions\ApiException $e) {
            echo "API call failed: " . htmlspecialchars($e->getMessage());
        }
    }
}
?>