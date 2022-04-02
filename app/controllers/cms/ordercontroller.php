<?php

namespace Controllers;
namespace Controllers\Cms;

use Services\Cms\OrderService;
use Services\Cms\EventService;
use Services\Cms\EventItemService;
use Services\Website\CulinaryService;

class OrderController {
    
    private $orderService;
    private $eventService;
    private $eventItemService;
    private $culinaryService;
    
    function __construct()
    {
        $this->orderService = new OrderService();
        $this->eventService = new EventService();
        $this->eventItemService = new EventItemService();
        $this->culinaryService = new CulinaryService();
        
    }
    

    // ## index for orders
    public function index() {
        $eventNames = $this->eventService->getEventNames();
        $orderList = $this->orderService->getAll();
        require __DIR__ . '/../../views/cms/order/index.php';
    }
    public function insertOne(){

        if (isset($_POST['submit'])) {
            
            // filter the post
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW); // <-- filter POST

            // get vars from post
            $Fullname = $_POST['fullname'];
            $Adress = $_POST['address'];
            $Email = $_POST['email'];
            $Phonenumber = $_POST['phonenumber'];
            


           $id=$this->orderService->insertOne($Fullname, $Adress, $Email, $Phonenumber);
           $this->insertBooking($id);
        }
    }

    public function insertBooking($id){
        $booking = $this->getCartBookings();
        var_dump($booking);
    }

    public function deleteOne(){
        $this->orderService->deleteOne();
    }
    public function updateOne(){
        $this->orderService->updateOne();
    }


     // ## get all bookings from session
     private function getCartBookings() {
        $bookings = array();
        foreach ($_SESSION['tickets'] as $key => $value) {
            $booking = $this->eventItemService->getOne($key);
            array_push($bookings, array('item' => $booking, 'amount' => $value));
        }
        return $bookings;
    }


    // ## get all reservations from session
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
}
?>