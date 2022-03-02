<?php

namespace Models;

class Event {
    public int $EventItem_ID;
    public string $Name;
    public string $Description;
    public string $Type;
    public string $Date;
    public string $Start_Time;
    public int $Location_ID;
    public int $Ticket_Price;
    public string $End_Time;
    public int $Tickets;
    public int $Event_ID;

    // public function __get($property) {
    //     if (property_exists($this, $property)) {
    //       return $this->$property;
    //     }
    //   }
    
    //   public function __set($property, $value) {
    //     if (property_exists($this, $property)) {
    //       $this->$property = $value;
    //     }
    
    //     return $this;
    //   }
}
?>