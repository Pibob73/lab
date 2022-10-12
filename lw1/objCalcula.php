<?php

class Calculator
{
    private $expression = 0;

    public function __construct()
    {
        $expression = 0;
    }

    public function sum(int $value) : Calculator
    {
        $this->expression += $value;
        return $this;
    }

    public function difference(int $value) : Calculator
    {
        $this->expression -= $value;
        return $this;
    }

    public function multiplication(int $value) : Calculator
    {
        $this->expression *= $value;
        return $this;
    }

    public function division(int $value) : Calculator
    {
        if ($value !== 0) {
            $this->expression /= $value;
        } else {
            $this->expression = 0;
        }
        return $this;
    }

    public function getResult(): string
    {
        return $this->expression;
    }
}

$calc = new Calculator();
echo $calc->sum(6)->division(0)->difference(2)->sum(6)->multiplication(2)->getResult()."\n";
