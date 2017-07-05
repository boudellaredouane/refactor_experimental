<?php
use \App\Models;
/**
 *
 */
class RentalTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    function can_create_rental_instance(){
        $rental = new Models\Rental();
        $this->assertNotNull($rental);
    }

    /**
     * @test
     */
    function can_create_rental_with_movie_and_period(){
        $movie = new Models\Movie("Cool Movie", Models\Movie::CHILDRENS);
        $rental = new Models\Rental($movie, 13);
        $this->assertEquals($movie, $rental->getMovie());
        $this->assertEquals(13, $rental->getRentalDaysPeriod());
    }
}

?>
