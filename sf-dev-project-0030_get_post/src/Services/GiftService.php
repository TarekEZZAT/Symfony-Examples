<?php
namespace App\Services;

class GiftService  {

    public $giftsPackage=['Watch','Necklace','Camera','Laptop','Phone'];

    public function __construct(){
        shuffle($this->gifts);
    }


}