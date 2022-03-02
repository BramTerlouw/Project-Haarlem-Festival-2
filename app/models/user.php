<?php

namespace Models;

class User {
  public int $user_ID;
    public string $FullName;
    public string $UserName;
    public string $Password;
    public string $BirthDate;
    public string $Gender;
    public string $Address;
    public string $PostCode;
    public string $City;
    public string $Role;
    public string $Supervisor;
    public string $Email;
    public string $PhoneNumber;

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