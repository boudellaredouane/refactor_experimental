<?php
namespace App\Models;
/**
 *
 */
class Movie
{
    const NEW_RELEASE = 1, REGULAR = 0, CHILDRENS = 2;
    protected $title;
    protected $type;

    public function __construct($title=null,$type=0){
        $this->title = $title;
        $this->type = $type;
    }

    function getTitle(){
        return $this->title;
    }

    function getType(){
        return $this->type;
    }
}


 ?>
