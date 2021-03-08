<?php
namespace App\Services;

class GiftService  {

    public $gifts=
    ['Watch','Necklace','Camera','Laptop','Phone'];

    public function __construct(){
        shuffle($this->gifts);
    }


}