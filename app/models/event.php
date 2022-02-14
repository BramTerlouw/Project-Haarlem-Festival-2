<?php

class Event {
  public int $Event_ID;
    public string $Name;
    public string $StartDate;
    public string $EndDate;
    public string $Genre;
    public string $Gender;
    public string $Description;
    public string $Type;
    public string $Status;

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