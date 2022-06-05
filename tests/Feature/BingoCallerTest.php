<?php

namespace Tests\Feature;

use App\BingoCaller;
use Tests\TestCase;

class BingoCallerTest extends TestCase
{
  
     /** @test */
    public function testItsTheValidRangeNumber()
    {
        $min = 1; 
        $max = 75;
        $caller = new BingoCaller();
        $number = $caller->shoutNumbers();
        
        $this->assertTrue(
            $number >= $min
            && $number <= $max
        );
    }
    
     /** @test */
    public function testCalls1To75AllNumberPresent()
    {
        $min = 1; 
        $max = 75;
        $caller = new BingoCaller();
        $calledNumbers = [];                
        for ($i=1; $i<=75; ++$i) {
            $calledNumbers[] = $caller->shoutNumbers();    
        }        
        sort($calledNumbers);
        $expectedNumbers = range($min, $max);

        $this->assertEquals($expectedNumbers, $calledNumbers);
    }

}
