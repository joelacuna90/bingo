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
}
