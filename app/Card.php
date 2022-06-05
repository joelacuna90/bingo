<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    /** @var array */
    private $grid;

    /** @var array */
    private $lettersRules = [
        'B' => [1, 15],
        'I' => [16, 30],
        'N' => [31, 45],
        'G' => [46, 60],
        'O' => [61, 75]
    ];

    public function __construct()
    {        
        $this->setNumberCard();        
    }

    public function isValid(): bool
    {
        return $this->hasValidSize() && $this->validBoundaries();        
    }

    public function hasFreeSpace(): bool
    {                
        return is_null($this->grid['N'][2]);
    }

    public function getNumbersCard()
    {
        return array_reduce(
            $this->grid,
            function (array $rowNew, array $row) {
                return array_merge($rowNew, $row);
            },
            []
        );          
    }

    private function hasValidSize(): bool
    {
        foreach ($this->grid as $column) {
            if (count($column) !== 5) 
                return false;            
        }

        return true;
    }

    private function setNumberCard(): void
    {
        foreach ($this->lettersRules as $key => $value) {            
            $min = $value[0];
            $max = $value[1];
            $this->grid[$key] = $this->generateColum($min, $max);    
        }
        $this->grid['N'][2] = null;
    }

    private function generateColum($min, $max)
    {
        $column = [];                
        while(count($column) < 5) {
            $newNumber = rand($min, $max);
            if (!in_array($newNumber, $column)) {
                $column[] = $newNumber;
            }
        }        

        return $column;
    }

    private function validBoundaries(): bool
    {
        $result = [];
        foreach ($this->grid as $key => $value) {
            $allowNull = false;
            if ($key == 'N') {
                $allowNull = true;
            }
            $result[] = $this->columHasElementBetween($value, $this->lettersRules[$key][0], $this->lettersRules[$key][1], $allowNull);
        }        
        if (in_array(false, $result)) {
            return false;
        }

        return true;
    }

    private function columHasElementBetween($column, $min, $max, $allowNull = false): bool
    {        
        foreach ($column as $number) {
            if ($allowNull && is_null($number)) {
                continue;
            }
            if ($number < $min || $number > $max) {
                return false;
            }
        }

        return true;
    }
}
