<?php

namespace Services\Cms;

use Repositories\Cms\BookingRepository;

class BookingService {
    private $repository;
    
    function __construct() {
        $this->repository = new BookingRepository();
    }

    // ## get bookings
    public function getOne($order_id) {
        return $this->repository->getOne($order_id);
    }


    // ## insert a booking when the payment is ready
    public function insertBooking($booking, $id){
        return $this->repository->insertBooking($booking, $id);
    }


    // ## update qr code
    public function updateQr($order_id, $qrCodeId) {
        return $this->repository->updateQr($order_id, $qrCodeId);
    }


    // ## update is_scanend field of 
    public function updateIsScanned($qrCodeId) {
        return $this->repository->updateIsScanned($qrCodeId);
    }
}