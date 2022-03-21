<?php
class Car{
    /**
     * @var int
     */
    public $speed_on_straight;
    /**
     * @var int
     */
    public $speed_on_curve;
    public function __construct(){
        $this->speed_on_straight = rand(4,18);
        $this->speed_on_curve = 22 - $this->speed_on_straight;
    }
}