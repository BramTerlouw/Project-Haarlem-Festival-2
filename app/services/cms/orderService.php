<?php

namespace Services\Cms;

use Repositories\Cms\OrderRepository;

class OrderService {
    private $repository;
    
    function __construct() {
        $this->repository = new OrderRepository();
    }

    // ## get orders
    public function getAll() {
        return $this->repository->getAll();
    }


    // ## insert one order
    public function insertOne($Fullname, $Adress, $Email, $Phonenumber, $subTotal, $Pricetotal){
        return $this->repository->insertOne($Fullname, $Adress, $Email, $Phonenumber, $subTotal, $Pricetotal);
    }


    // ## get one order
    public function getOne($order_id) {
        return $this->repository->getOne($order_id);
    }


    // ## update payment status
    public function updatePaymentStatus(){
        return $this->repository->updatePaymentStatus();
    }

    public function UpdateOrderUuid($id, $uuid){
        return $this->repository->UpdateOrderUuid($id, $uuid);
    }

    public function GetOrderByUuid($uuid){
        return $this->repository->GetOrderByUuid($uuid);
    }
    

}