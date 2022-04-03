<?php

namespace Controllers;
namespace Controllers\Cms;

use Services\Cms\OrderService;
use Services\Cms\EventService;
use Services\Cms\EventItemService;
use Services\Website\CulinaryService;

use Knp\Snappy\Pdf;
use Services\website\ReservationService;
use Services\cms\BookingService;
use Controllers\website\PaymentController;

class OrderController {
    
    private $orderService;
    private $eventService;
    private $eventItemService;
    private $culinaryService;
    private $reservationService;
    private $bookingService;
    private $paymentcontroller;
    
    function __construct()
    {
        $this->orderService = new OrderService();
        $this->eventService = new EventService();
        $this->eventItemService = new EventItemService();
        $this->culinaryService = new CulinaryService();
        $this->reservationService = new reservationService();
        $this->bookingService = new BookingService();
        $this->paymentcontroller = new PaymentController();
    }
    

    // ## index for orders
    public function index() {
        $eventNames = $this->eventService->getEventNames();
        $orderList = $this->orderService->getAll();
        require __DIR__ . '/../../views/cms/order/index.php';
    }
    //method for inserting the order and the booking and reservation in the cart
    //Then it will initialize the payment trough mollie
    public function insertOne(){

        if (isset($_POST['submit'])) {
            
            // filter the post
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW); // <-- filter POST

            // get vars from post
            $Fullname = $_POST['fullname'];
            $Adress = $_POST['address'];
            $Email = $_POST['email'];
            $Phonenumber = $_POST['phonenumber'];
            $bookings = $this->getCartBookings();
            $reservations = $this->getCartReservations();
            $subTotal = $this->calcTotal($bookings, $reservations);
            $Pricetotal = $subTotal * 1.21;

           $id=$this->orderService->insertOne($Fullname, $Adress, $Email, $Phonenumber, $subTotal, $Pricetotal);
           $this->insertBooking($id, $bookings);
           $this->insertReservation($id, $reservations);

           $this->InitializeMollie($Pricetotal, $id);
        }
    }
    //method for calling the method for mollie
    public function InitializeMollie($Pricetotal, $id){
        $this->paymentcontroller->InitializeMollie($Pricetotal, $id);
    }
    //method to insert a booking with the correct data into the database
    public function insertBooking($id, $bookings){
        foreach($bookings as $booking){
            for ($x = 0; $x < $booking['amount']; $x++){
                $this->bookingService->insertBooking($booking, $id);
            }
        }
    }
    //method to insert a reservation into the database
    public function insertReservation($id, $reservations){
        foreach($reservations as $reservation){
            $this->reservationService->insertReservation($reservation, $id);
        }
    }
    //method for deleting a order
    public function deleteOne(){
        $this->orderService->deleteOne();
    }
    //method for updating an order
    public function updateOne(){
        $this->orderService->updateOne();
    }


    // get all bookings from session and storing them in a array
    private function getCartBookings() {
        $bookings = array();
        foreach ($_SESSION['tickets'] as $key => $value) {
            $booking = $this->eventItemService->getOne($key);
            array_push($bookings, array('item' => $booking, 'amount' => $value));
        }
        return $bookings;
    }


    // get all reservations from session and storing them in a array
    private function getCartReservations() {
        $reservations = array();
        foreach ($_SESSION['reservations'] as $reservation) {
            $restaurant = $this->culinaryService->getOne($reservation['restaurant_ID']);

            $dateTimeArr = explode(',', $reservation['dateTime']);

            array_push($reservations, array('id' => $reservation['id'], 'restaurant' => $restaurant, 'amountChild' => $reservation['amountChild'], 'amountAdult' => $reservation['amountAdult'], 'date' => $dateTimeArr[0], 'time' => $dateTimeArr[1]));
        }
        return $reservations;
    }


    // Calc total of shopping cart
    private function calcTotal($bookings, $reservations) {
        $total = 0;
        foreach ($bookings as $booking) {
            $total += ($booking['item']->Ticket_Price * $booking['amount']);
        }

        foreach ($reservations as $reservation) {
            $total += $reservation['restaurant']->Price_Adults * $reservation['amountAdult'];
            $total += $reservation['restaurant']->Price_Children * $reservation['amountChild'];
            $total += 10;
        }

        return $total;
    }

    // ## view an order
    public function view() {
        $eventNames = $this->eventService->getEventNames();

        $orderList = $this->orderService->getAll();

        $order_id = $_GET['order_id'];
        $orderData = $this->orderService->getOne($order_id);
        
        require __DIR__ . '/../../views/cms/order/view.php';
    }
}
?>