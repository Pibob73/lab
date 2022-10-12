<?php

class Calculator
{
    private $expression = double;

    public function __construct()
    {
        $expression = 0;
    }

    public function sum(int $value): self
    {
        $this->expression += $value;
        return $this;
    }

    public function difference(int $value): self
    {
        $this->expression -= $value;
        return $this;
    }

    public function multiplication(int $value): self
    {
        $this->expression *= $value;
        return $this;
    }

    public function division(int $value): self
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
echo $calc->sum(6)->division(0)->difference(2)->sum(6)->multiplication(2)->getResult() . "\n";
