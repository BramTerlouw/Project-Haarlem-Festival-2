<?php
namespace Controllers\Website;
use Controllers\Controller;
use Services\Website\BookingService;
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

    public function insertOrder(){
        $this->orderservice->inserOne();
    }
    public function insertBooking($order){
        $this->bookingservice->insertBooking();
    }

    public function insertReservation($order){
        $this->reservationservice->insertReservation();
    }

    public function UpdatePaymentStatus(){
        $this->orderservice->updatePaymentStatus();
    }

    public function InitializeMollie(){
        $mollie = new \Mollie\Api\MollieApiClient();
        $mollie->setApiKey("test_Ds3fz4U9vNKxzCfVvVHJT2sgW5ECD8");
        try {
            $payment = $mollie->payments->create([
                  "amount" => [
                        "currency" => "EUR",
                        "value" => "10.00" // You must send the correct number of decimals, thus we enforce the use of strings
                  ],
                  "description" => "Order #12345",
                  "redirectUrl" => " http://f9d5-213-127-46-47.ngrok.io/hf/payment/confirmation",
                  "webhookUrl" => "http://f9d5-213-127-46-47.ngrok.io/hf/payment/ProcessPayment",
                //   "metadata" => [
                //     "order_id" => $orderId,
                // ],
            ]);
    
            header("Location: " . $payment->getCheckoutUrl(), true, 303);

        } catch (\Mollie\Api\Exceptions\ApiException $e) {
            echo "API call failed: " . htmlspecialchars($e->getMessage());
        }
      
    }

    public function ProcessPayment(){
        //header("Location: /");
        $mollie = new \Mollie\Api\MollieApiClient();
        $mollie->setApiKey("test_Ds3fz4U9vNKxzCfVvVHJT2sgW5ECD8");
        try {
            $payment = $mollie->payments->get($_POST["order_id"]);
            $orderId = $payment->metadata->order_id;
            
            if ($payment->isPaid()) {
                //updaten van de payment status
                //UpdatePaymentStatus($orderId);
                
                
            } else {
                return $this->json(["Error" => "Some error Occurred!"]);
            } 
            
        } catch (\Mollie\Api\Exceptions\ApiException $e) {
            echo "API call failed: " . htmlspecialchars($e->getMessage());
        }
    }

}
?>