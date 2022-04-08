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
    

    // index function of cart
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

        foreach ($reservations as $reservation) {
            $total += $reservation['restaurant']->Price_Adults * $reservation['amountAdult'];
            $total += $reservation['restaurant']->Price_Children * $reservation['amountChild'];
            $total += 10;
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


    // ## add booking to cart
    public function AddTicketToCart() {
        if (!isset($_SESSION['tickets']))
            $_SESSION['tickets']=array();
        
        $id = $_GET['id'];
        $event = $_GET['event'];

        // check if there are enough tickets
        if (!$this->checkTicketStock($id)) {
            header('Location: /hf/' . $event . '?event=' . $event);
            return;
        }

        if (array_key_exists($id, $_SESSION['tickets'])) {
            $_SESSION['tickets'][$id] += 1;
        } else {
            $_SESSION['tickets'][$id] = 1;
        }

        header('Location: /hf/' . $event . '?event=' . $event);
    }


    // ## only add to cart when enough tickets are left
    private function checkTicketStock($id) {
        $ticketsSold = $this->eventItemService->getManyTickets($id);
        
        // if no sells are made, there are enough tickets
        if ($ticketsSold == null)
            return true;

        // if there are already tickets in cart, get those, else set to 0
        if (array_key_exists($id, $_SESSION['tickets']))
            $cartAmount = $_SESSION['tickets'][$id];
        else
            $cartAmount = 0;
        
        // if there is enough return true, else return false
        if (($ticketsSold[0]['Sold'] + $cartAmount) >= $ticketsSold[0]['Tickets'])
            return false;
        else
            return true;
    }


    // ## add reservation to cart
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

            // make reservation and push to session
            $res = array('id' => $tempID, 'restaurant_ID' => $_GET['id'], 'amountAdult' => $nrAdults, 'amountChild' => $nrChidls, 'dateTime' => $datetime, 'message' => $message);

            if (isset($_POST['res_ID'])) { // or edit and replace
                $key = array_search($_POST['res_ID'], array_column($_SESSION['reservations'], 'id'));
                $_SESSION['reservations'][$key] = $res;
            }
            else
                array_push($_SESSION['reservations'], $res);
        }
        header('Location: /hf/culinary?event=culinary');
    }


    // ## empty cart by unsetting the session vars
    public function unset() {
        unset($_SESSION['reservations']);
        unset($_SESSION['tickets']);
        header('Location: /hf/cart');
    }
}
?>