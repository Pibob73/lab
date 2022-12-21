<?php

class Calculator
{
    public float $expression;

    public function __construct()
    {
        $this->expression = 0.0;
    }

    public function sum(float $value): self
    {
        $this->expression += $value;
        return $this;
    }

    public function difference(float $value): self
    {
        $this->expression -= $value;
        return $this;
    }

    public function multiplication(float $value): self
    {
        $this->expression *= $value;
        return $this;
    }

    public function division(float $value): self
    {
        try {
            $this->expression /= $value;
        }catch (DivisionByZeroError $error){
            throw new DivisionByZeroError('division by zero');
        }
        return $this;
    }

    public function getResult(): string
    {
        return $this->expression;
    }
}