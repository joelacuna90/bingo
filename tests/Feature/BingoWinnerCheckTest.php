<?php

namespace Tests\Feature;

use App\BingoCaller;
use App\Bingo;
use Tests\TestCase;

class BingoWinnerCheckTest extends TestCase
{
   /** @test */
   public function testCheckNotWinner()
   {
       $bingoCaller       = new BingoCaller();
       $bingoCardGenerate = (new Bingo())->generateCard();       

       for ($i=1; $i <= 55 ; $i++) { 
           $bingoCaller->shoutNumbers();
       }

       $this->assertFalse(BingoCaller::isWinner($bingoCaller, $bingoCardGenerate));
   }


   /** @test */
   public function testCheckWinner()
   {
       $bingoCaller       = new BingoCaller();
       $bingoCardGenerate = (new Bingo())->generateCard();

       for ($i=1; $i<=75; ++$i) {
           $bingoCaller->shoutNumbers();
       }

       $this->assertTrue(BingoCaller::isWinner($bingoCaller, $bingoCardGenerate));
   }

}
