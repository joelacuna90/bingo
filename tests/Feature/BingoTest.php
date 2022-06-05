<?php

namespace Tests\Feature;

use App\Bingo;
use Tests\TestCase;

class BingoTest extends TestCase
{
    /** @test */    
    public function testCardStructure()
    {
        $bingoCard          = new Bingo();
        $bingoCardGenerate  = $bingoCard->generateCard();

        $this->assertTrue($bingoCardGenerate->isValid());
    }
    
    /** @test */
    public function testValidatedFreeSpace()
    {
        $bingoCard         = new Bingo();
        $bingoCardGenerate = $bingoCard->generateCard();        
        
        $this->assertTrue($bingoCardGenerate->hasFreeSpace());
    }     
}
