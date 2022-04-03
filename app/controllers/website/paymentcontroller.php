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

    public function UpdatePaymentStatus($Order_ID){
        $this->orderservice->updatePaymentStatus($Order_ID);
    }

    public function InitializeMollie(){
        
        $mollie = new \Mollie\Api\MollieApiClient();
        $mollie->setApiKey("test_Ds3fz4U9vNKxzCfVvVHJT2sgW5ECD8");
        $payment = $mollie->payments->create([
              "amount" => [
                    "currency" => "EUR",
                    "value" => "10.00" // You must send the correct number of decimals, thus we enforce the use of strings
              ],
              "description" => "Order #12345",
              "redirectUrl" => "/payment/confirmation",
              "webhookUrl" => "/payment/processpayment",
              "metadata" => [
                    "order_id" => "12345",
              ],
        ]);

        header("Location: " . $payment->getCheckoutUrl(), true, 303);
        $this->RetrievePayment();
    }
    public function RetrievePayment(){

        $payment = $mollie->payments->get($payment->id);

        if ($payment->isPaid())
        {
            echo "Payment received.";
        }

    }

    public function ProcessPayment(){
        try {
           
            $payment = $mollie->payments->get($_POST["id"]);
            $orderId = $payment->metadata->order_id;

            if ($payment->isPaid() && ! $payment->hasRefunds() && ! $payment->hasChargebacks()) {
                //updaten van de payment status
                UpdatePaymentStatus($orderId);

            } elseif ($payment->isOpen()) {

                return $this->json(["Error" => "Some error Occurred!"]);
                
            } elseif ($payment->isPending()) {
                /*
                * The payment is pending.
                */
            } elseif ($payment->isFailed()) {
                /*
                * The payment has failed.
                */
            } elseif ($payment->isExpired()) {
                /*
                * The payment is expired.
                */
            } elseif ($payment->isCanceled()) {
                /*
                * The payment has been canceled.
                */
            } elseif ($payment->hasRefunds()) {
                /*
                * The payment has been (partially) refunded.
                * The status of the payment is still "paid"
                */
            } elseif ($payment->hasChargebacks()) {
                /*
                * The payment has been (partially) charged back.
                * The status of the payment is still "paid"
                */
            }
        } catch (ApiException $e) {
            echo "API call failed: " . htmlspecialchars($e->getMessage());
        }
    }
}
?>