<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BingoCaller extends Model
{

    private $numbers = [];
    
    public function shoutNumbers(): int
    {
        do {
            $numberRand = rand(1, 75);            
        } while (
            in_array($numberRand, $this->numbers)
        );
        
        $this->numbers[] = $numberRand;  

        return $numberRand;        
    }

    public static function isWinner(BingoCaller $caller, Card $card)
    {
        $result = [];
        $getNumbersCard = $card->getNumbersCard();
        foreach ($getNumbersCard as $number) {
            if (is_null($number)) {
                continue;            
            }                 
            if (!$caller->hasNumber($number)) {                
                return false;
            }            
        }        
        
        return true;
    }    

    private function hasNumber($number): bool
    {        
        return in_array($number, $this->numbers);
    }
}
