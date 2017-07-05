<?php

namespace App\Models;
use Exception;
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
        $result = "\nRental Record for " . $this->getName();
        foreach ($this->rentals as $index => $each) {
            $thisAmount = 0;
            $movieType = $each->getMovie()->getType();
            switch ($movieType) {
                case Movie::CHILDRENS:
                    $thisAmount += 1.5;
                    if($each->getRentalDaysPeriod() > 3){
                        $thisAmount += ($each->getRentalDaysPeriod() - 3)* 1.5;
                    }
                    break;
                case Movie::NEW_RELEASE:
                    $thisAmount += $each->getRentalDaysPeriod() * 3;
                    break;
                case Movie::REGULAR:
                    $thisAmount += 2;
                    if($each->getRentalDaysPeriod() > 2){
                        $thisAmount += ($each->getRentalDaysPeriod() - 2) * 1.5;
                    }
                    break;
                default:
                    throw new Exception("Illegal Movie Type");
                    break;
            }

            $frequesntRenterPoints++;

            if($each->getMovie()->getType() == Movie::NEW_RELEASE
                && $each->getRentalDaysPeriod() > 1){
                $frequesntRenterPoints++;
            }
            $totalAmount += $thisAmount;
            $result .= "\n- ".$each->getMovie()->getTitle()." : $thisAmount";
        }

        $result .= "\nTotal spent : $totalAmount\n";
        $result .= "\nYou earned : $frequesntRenterPoints frequent renter points\n";
        return $result;
    }
}

 ?>
