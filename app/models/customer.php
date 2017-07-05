<?php

namespace App\Models;
/**
 *
 */
class Customer
{
    protected $name;
    protected $rentals = [];
    function __construct($name)
    {
        $this->name = $name;
    }

    function getName(){
        return $this->name;
    }

    function addRental($rental){
        $this->rentals[] = $rental;
    }

    function getRentals(){
        return $this->rentals;
    }
}

 ?>
