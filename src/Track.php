<?php

class Track{
    /**
     * @var array
     */
    public $elements;
    /** 
     * Sets up the track for the first time. 
     */ 
    public function setupTrack(){
        for($i=0; $i<2000;$i+=40){
            $element = rand(0,1); // 0 for curve, 1 for straight
            $element_array = array_fill(0,40,$element); // array of 40 of the same element type
            array_push($this->elements, $element_array);
        }
    }
    public function __construct()
    {
        $this->setupTrack();
    }
    /**
     * Check the next element
     * @param int $element_index
     * @return int element ( 0 for curve, 1 for straight )
     */
    public function checkNextElement($element_index){
        $next_element_index = (round($element_index / 40) + 1) * 40;
        return $this->elements[$next_element_index];
    }
}