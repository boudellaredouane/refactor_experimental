<?php
use \App\Models\Movie;
/**
 *
 */
class MovieTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    function can_create_movie_instance(){
        $movie = new Movie();
        $this->assertNotNull($movie);
    }

    /**
     * @test
     */
    function can_create_movie_instance_with_title_and_type(){
        $movie = new Movie("Cool movie",Movie::NEW_RELEASE);
        $this->assertEquals("Cool movie",$movie->getTitle());
        $this->assertEquals(Movie::NEW_RELEASE,$movie->getType());
    }
}

?>
