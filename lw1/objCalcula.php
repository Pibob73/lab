<?php
class Calculator {
    public $expression;
    function __Calculator(){
        $expression = 0;
    }
    function sum(int $value){
        $this->expression += $value;
        return $this;
    }
    function difference(int $value){
        $this->expression -= $value;
        return $this;
    }
    function multiplication(int $value){
        $this->expression *= $value;
        return $this;
    }
    function division(int $value){
        if($value !== 0) {
            $this->expression /= $value;
        }else{
            $this->expression = 0;
        }
        return $this;
    }
    function getResult(): string{
        return $this->expression;
    }
}
$calc = new Calculator();
echo $calc->sum(6)->division(0)->difference(2)->multiplication(2)->getResult();
