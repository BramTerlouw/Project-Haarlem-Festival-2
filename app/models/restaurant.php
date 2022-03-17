<?php

namespace Models;

class Restaurant {

public int $Restaurant_ID;
public string $Name;
public string $Type;
public string $Summary;
public string $Adres;
public int $Price_Adults;
public int $Price_Children;
public int $Max_visitors;
public bool $Wheelchair_accessible;
}
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
?>