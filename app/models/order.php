<?php

namespace Models;

class Order {
    public int $Order_ID;
    public string $PhoneNumber;
    public string $FullName;
    public string $Email;
    public string $Adress;
    public string $Payment_Due_Date;
    public int $Total_price;
    public int $Subtotal;
}
?>