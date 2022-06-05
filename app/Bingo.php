<?php

namespace App;


use App\Card;
use Illuminate\Database\Eloquent\Model;

class Bingo extends Model
{
    public function generateCard(): Card
    {     
        return new Card();
    }
}
