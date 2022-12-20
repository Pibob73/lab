<?php
require_once "src/objCalcula.php";

use PHPUnit\Framework\TestCase;

class CalculaTest extends TestCase
{
    private object $calculator;

    protected function setUp(): void
    {
        $this->calculator = new Calculator();
    }

    public function testDivision()
    {
        $this->expectException(DivisionByZeroError::class);
        $this->calculator->division(0)->getResult();
    }

    public function testMultiplication()
    {
        $this->assertEquals(0, $this->calculator->multiplication(2)->getResult());
    }

    public function testDifference()
    {
        $this->assertEquals(-2, $this->calculator->difference(2)->getResult());
    }

    public function testSum()
    {
        $this->assertEquals(2, $this->calculator->sum(2)->getResult());
    }
}