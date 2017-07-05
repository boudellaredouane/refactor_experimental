<?php
use \App\Models;
/**
 *
 */
class CustomerTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    function can_create_customer_instance(){
        $customer = new Models\Customer("Redouane");
        $this->assertNotNull($customer);
    }

    function can_create_customer_instance_with_name(){
        $customer = new Models\Customer("Redouane");
        $this->assertEquals("Redouane", $customer->getName());
    }

    /**
     * @test
     */
    function can_append_rentals_for_customer(){
        $rental_1 = $this->generateRental();
        $rental_2 = $this->generateRental();
        $customer = new Models\Customer("Redouane");
        $customer->addRental($rental_1);
        $customer->addRental($rental_2);
        $this->assertCount(2, $customer->getRentals());
    }

    private function generateRental(){
        $movie = new Models\Movie("Cool Movie", Models\Movie::NEW_RELEASE);
        $rental = new Models\Rental($movie, 5);
        return $rental;
    }
}

 ?>
