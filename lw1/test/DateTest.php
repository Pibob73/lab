<?php
require_once 'src/objDate.php';
use PHPUnit\Framework\TestCase;
class DateTest extends TestCase
{
    private $date;
    private $date2;
    protected function setUp(): void
    {
        $date = new Date(1, 2, 1);
        $date2 = new Date(1, 2, 2);
    }
    public function testSumDay(){
        $this->assertEquals(32, $this->date->convertToDaY());
    }
    public function testFormat(){
        $this->assertEquals('1-2-1', $this->date->format('en'));
    }
    public function testGetDateOfWeek(){
        $this->assertEquals('Monday', $this->date->getDateOfWeek());
    }
    public function testConvertToDate(){
        $this->assertEquals([5, 0, 0], $this->date->convertToDate(5));
    }
    public function testDiffDay(){
        $this->assertEquals(365, $this->date->difDay($this->date2));
    }
    public function testMinusDayEn(){
        $this->assertEquals('27-1-1', $this->date->minusDay(5));
    }
    public function testMinusDayRu(){
        $this->assertEquals('27.1.1', $this->date->minusDay(5));
    }
    public function testGetDateEn(){
        $this->assertEquals('1-2-1', $this->date->getDate());
    }
    public function testGetDateRu(){
        $this->assertEquals('1.2.1', $this->date->getDate());
    }
    public function testExaminationForLetter(){
        $this->assertTrue($this->date->examinationForLetter());
    }
    public function testExamSymbol(){
        $this->assertTrue($this->date->examSymbol());
    }


}