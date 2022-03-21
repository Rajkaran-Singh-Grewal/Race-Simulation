<?php
include('RaceResult.php');
include('Car.php');
include('Track.php');
include('RoundResult.php');
class Race
{
    public function runRace(): RaceResult
    {
        $raceResult = new RaceResult;
        $cars = [];
        // initialize five cars
        for($i = 0; $i < 5; $i++){
            $car = new Car;
            array_push($cars, $car);
        }
        $track = new Track;
        $reach_finishline = false;
        $round = 1;
        $prevElement = array_fill(0,5,$track->elements[0]);
        $carPositions = [0,0,0,0,0];
        while(!$reach_finishline){
            for($i = 0;$i < 5; $i++){
                if($track->checkNextElement($carPositions[$i]) == $prevElement[$i]){
                    $carPositions[$i] = $carPositions[$i] + ($prevElement[$i] == 0 ? $cars[$i]->speed_on_curve : $cars[$i]->speed_on_straight);
                    if($carPositions[$i] > 2000){
                        $carPositions[$i] = 2000;
                    }

                }else{
                    $max_position = (round($carPositions[$i] / 40) + 1) * 40;
                    $max_position = $max_position > 2000 ? 2000 : $max_position;
                    $carPositions[$i] = $carPositions[$i] + ($prevElement[$i] == 0 ? $cars[$i]->speed_on_curve : $cars[$i]->speed_on_straight);
                    if($carPositions[$i] > $max_position){
                        $carPositions[$i] = $max_position;
                        if(array_key_exists($max_position,$track->elements)){
                            $prevElement[$i] = $track->elements[$max_position];
                        }
                    }
                }
                if($carPositions[$i] == 2000){
                    $reach_finishline = true;
                }
            }
            $roundResult = new RoundResult($round, $carPositions);
            $raceResult->pushRoundResults($roundResult);
            $round+=1;
        }
        return $raceResult;
    }

}
