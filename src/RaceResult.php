<?php

class RaceResult
{
    /**
     * @var array of StepResult
     */
    private $roundResults = [];

    public function getRoundResults(): array
    {
        return $this->roundResults;
    }
    public function pushRoundResults(RoundResult $roundResult){
        array_push($this->roundResults, $roundResult);
    }
}
