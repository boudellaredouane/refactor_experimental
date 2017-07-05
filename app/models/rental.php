<?php

namespace App\Models;
/**
 *
 */
class Rental
{
    protected $movie;
    protected $rentalDays;

    function __construct($movie = null, $rentalDays = 0){
        $this->movie = $movie;
        $this->rentalDays = $rentalDays;
    }

    function getMovie(){
        return $this->movie;
    }

    function getRentalDaysPeriod(){
        return $this->rentalDays;
    }
}

 ?>
