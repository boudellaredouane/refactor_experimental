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

    /**
     * @test
     */
    function can_append_statement_for_3_types(){
        $rental_1 = $this->generateRental(Models\Movie::REGULAR,2);
        $rental_2 = $this->generateRental(Models\Movie::CHILDRENS);
        $rental_3 = $this->generateRental(Models\Movie::NEW_RELEASE,5);

        $customer = new Models\Customer("Redouane");
        $customer->addRental($rental_1);
        $customer->addRental($rental_2);
        $customer->addRental($rental_3);
        $statement = $customer->statement();

        $expected = "\nRental Record for Redouane\n- Cool Movie : 2\n- Cool Movie : 1.5\n- Cool Movie : 15\nTotal spent : 18.5\n\nYou earned : 4 frequent renter points\n";
        $this->assertEquals($expected, $statement);
    }

    /**
     * @test
     */
    function can_append_statement_for_no_movie(){

        $customer = new Models\Customer("Redouane");

        $statement = $customer->statement();
        $expected = "\nRental Record for Redouane\nTotal spent : 0\n\nYou earned : 0 frequent renter points\n";
        $this->assertEquals($expected, $statement);
    }

    /**
     * @test
     */
    function can_append_statement_for_1_movie_0_rental_period(){
        $rental_1 = $this->generateRental(Models\Movie::REGULAR,0);
        $customer = new Models\Customer("Redouane");
        $customer->addRental($rental_1);
        $statement = $customer->statement();
        $expected = "\nRental Record for Redouane\n- Cool Movie : 2\nTotal spent : 2\n\nYou earned : 1 frequent renter points\n";
        $this->assertEquals($expected, $statement);
    }

    /**
     * @test
     */
    function can_append_statement_for_same_movie_multiples(){
        $rental_1 = $this->generateRental(Models\Movie::REGULAR,3);
        $rental_2 = $this->generateRental(Models\Movie::REGULAR,1);
        $rental_3 = $this->generateRental(Models\Movie::REGULAR,5);
        $customer = new Models\Customer("Redouane");
        $customer->addRental($rental_1);
        $customer->addRental($rental_2);
        $customer->addRental($rental_3);
        $statement = $customer->statement();
        $expected = "\nRental Record for Redouane\n- Cool Movie : 3.5\n- Cool Movie : 2\n- Cool Movie : 6.5\nTotal spent : 12\n\nYou earned : 3 frequent renter points\n";
        $this->assertEquals($expected, $statement);
    }

    private function generateRental($movieType = 0, $rentalPeriod = 1){
        $movie = new Models\Movie("Cool Movie", $movieType);
        $rental = new Models\Rental($movie, $rentalPeriod);
        return $rental;
    }
}

 ?>
