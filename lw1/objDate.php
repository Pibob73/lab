<?php

class Date
{
    private int $year;
    private int $month;
    private int $day;
    public int $sumday;
    public string $letter = '.';

    public function __construct(int $_day, int $_month, int $_year)
    {
        if(!$this->examSymbol($_day, $_month)){
            $this->month = 3;
            $this->day = 3;
        }else {
            $this->year = $_year;
            $this->month = $_month;
            $this->day = $_day;
        }
        $this->sumday = $_day;
        $this->convertToDay($_month, $_year);
    }

    private function convertToDay(int $_month, int $_year)
    {
        $h = intval(($_month - 1) / 2);
        if ($h === 0) $h++;
        $a = 28;
        if ($_year % 4 === 0)
            $a = 29;
        if ($_month <= 2)
            $a = 0;
        $b = 1;
        if ($_month - 1 === 0) $b--;
        if (($_month - 1) % 2 === 0 || $h === 1) {
            $this->sumday += ($h - 1) * 30 + $b * ($h * 31) + $a;
        } else
            $this->sumday += ($h - 1) * 30 + ($h + 1) * 31 + $a;
        $this->sumday += intval(($_year - 1) / 4) * 366;
        $this->sumday += (($_year - 1) - intval(($_year - 1) / 4)) * 365;
    }

    private function convertToDate(int $num): array
    {
        $massDate = ['day' => 0, 'month' => 0, 'year' => 0];
        $a = intval($this->year / 4);
        $num -= 366 * $a;
        if ($num % 365 !== 0) $a++;
        $massDate['year'] = intval(($num / 365) + $a);
        $b = 0;
        $c = 0;
        if ($num % 365 > 59) {
            $b = 28;
            $c = 1;
        }
        if ((($num % 365)) < 31)
            $massDate['month'] = 1;
        else
            $massDate['month'] = intval(((($num % 365) - $b) / 31) + $c);
        $massDate['day'] = (($num % 365) - $b) % 31;
       return $massDate;
    }

    private function examSymbol(int $_day, int $_month): bool
    {
        return $_day > 31 && $_month > 12;
    }

    private function examinationForLetter(string $_letter): bool
    {
        if ($_letter === 'ru' || $_letter === 'en')
            return true;
        return false;
    }

    public function diffDay(self $_date): int
    {
        if ($this->sumday > $_date->sumday)
            return $this->sumday - $_date->sumday;
        return $_date->sumday - $this->sumday;
    }

    public function format(string $_letter): string
    {
        if (!$this->examinationForLetter($_letter))
            return 'invalid value';
        if ($_letter === 'ru') {
            $this->letter = '.';
        } else
            $this->letter = '-';
        return $this->getDate();
    }

    public function minusDay(int $number): string
    {
        $result = $this->sumday - $number;
        $_date = implode($this->letter, $this->convertToDate($result));
        return $_date;
    }

    public function getDateOfWeek(): string
    {
        $num = $this->sumday;
        $a = intval($this->year / 4);
        $num -= 366 * $a;
        $b = 0;
        if ($num % 365 > 59) $b = 28;
        $key = ((($num % 365) - $b) % 31) % 7;
        $massOfWeek = ['','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
        return $massOfWeek[$key];
    }

    public function getDate(): string
    {
        $massDate = ['day' => $this->day, 'month' => $this->month, 'year' => $this->year];
        $date = implode($this->letter, $massDate);
        return $date;
    }
}

$date = new Date(4, 2,4 );
$date2 = new Date(1, 2, 5);
echo $date->sumday."\n";
echo $date->format('en')."\n";
echo $date->getDate()."\n";
echo $date->diffDay($date2)."\n";
echo $date2->minusDay(5)."\n";
echo $date->getDateOfWeek()."\n";
echo $date->letter."\n";