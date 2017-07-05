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

    function statement(){
        $totalAmount = 0;
        $frequesntRenterPoints = 0;
        $result = "Rental Record for " . $this->getName() . "\n";
        foreach ($this->rentals as $index => $each) {
            $thisAmount = 0;
        }

        return $result;
    }
}

 ?>
