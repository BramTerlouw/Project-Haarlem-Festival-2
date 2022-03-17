<?php

namespace Controllers;
namespace Controllers\Website;

use Services\Cms\EventItemService;
use Services\Website\CulinaryService;

class CartController {
    private $eventItemService;
    private $culinaryService;

    function __construct()
    {
        $this->eventItemService = new EventItemService();
        $this->culinaryService = new CulinaryService();
    }
    
    public function index() {

        if (!isset($_SESSION['reservations']))
            $_SESSION['reservations']=array();
        if (!isset($_SESSION['tickets']))
            $_SESSION['tickets']=array();

        $bookings = $this->getCartBookings();
        $reservations = $this->getCartReservations();

        $total = $this->calcTotal($bookings, $reservations);
        require __DIR__ . '/../../views/cart/index.php';
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
        return $total;
    }


    // ## set new amount in sessios
    public function setBookingAmount() {
        $id = $_GET['id'];
        $amount = $_GET['amount'];

        // if 0 delete from cart, else adjust amount
        if ($amount == 0)
            unset($_SESSION['tickets'][$id]);
        else {
            $_SESSION['tickets'][$id] = (int)$amount;
        }

        header('Location: /hf/cart');
    }

    public function AddTicketToCart() {
        if (!isset($_SESSION['tickets']))
            $_SESSION['tickets']=array();
        
        $id = $_GET['id'];
        $event = $_GET['event'];

        if (array_key_exists($id, $_SESSION['tickets'])) {
            $_SESSION['tickets'][$id] += 1;
        } else {
            $_SESSION['tickets'][$id] = 1;
        }

        header('Location: /hf/' . $event . '?event=' . $event);
    }

    public function addResToCart() {
         // check for POST var
         if (isset($_POST['submit'])) {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW); // <-- filter POST
            
            if (!isset($_SESSION['reservations']))
            $_SESSION['reservations']=array();

            // get vars
            $tempID = uniqid();
            $nrAdults = $_POST['NmbAdults'];
            $nrChidls = $_POST['NmbChild'];
            $date = $_POST['ActivityDate'];
            $time = $_POST['ActivityTime'];
            if (isset($_POST['ActivityMessage']))
                $message = $_POST['ActivityMessage'];
            else
                $message = "";

            $datetime = $date . ',' . $time;

            $res = array('id' => $tempID, 'restaurant_ID' => $_GET['id'], 'amountAdult' => $nrAdults, 'amountChild' => $nrChidls, 'dateTime' => $datetime, 'message' => $message);
            array_push($_SESSION['reservations'], $res);
        }
        header('Location: /hf/culinary/restaurants');
    }

    public function unset() {
        unset($_SESSION['reservations']);
        unset($_SESSION['tickets']);
        header('Location: /hf/cart');
    }
}
?>