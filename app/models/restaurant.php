<?php

namespace Models;

class Restaurant {

public int $Restaurant_ID;
public string $Name;
public string $Type;
public string $Summary;
public string $Adres;
public float $Price_Adults;
public float $Price_Children;
public int $Max_visitors;
public bool $Wheelchair_accessible;

public int $Sessions;
public string $Duration;
public string $Start_Time;
public bool $Status;
}
?>