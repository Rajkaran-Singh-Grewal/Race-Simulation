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
	$this->elements = [];    
	for($i=0; $i<2000;$i+=40){
            $element = rand(0,1); // 0 for curve, 1 for straight
            for($j=0;$j<40;$j++){
                array_push($this->elements, $element);
            }
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
        if(!array_key_exists($next_element_index, $this->elements)){
            return null;
        }
        return $this->elements[$next_element_index];
    }
}
