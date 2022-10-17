<?php

class Date
{
    public int $year;
    public int $month;
    public int $day;
    public int $sumday;
    public string $letter = '.';

    public function __construct(int $_day, int $_month, int $_year)
    {
        if($this->examSymbol($_day, $_month)){
            $this->month = 3;
            $this->day = 3;
            $this->year = 3;
        }else {
            $this->year = $_year;
            $this->month = $_month;
            $this->day = $_day;
        }
        $this->sumday = $_day;
        $this->convertToDay($_month, $_year);
    }

    private function convertToDay(int $_month, int $_year): int
    {
        $helper = intval(($_month - 1) / 2);
        if ($helper === 0) $helper++;
        $leapYear = 28;
        if ($_year % 4 === 0)
            $leapYear = 29;
        if ($_month <= 2)
            $leapYear = 0;
        $coefficient = 1;
        if ($_month - 1 === 0) $coefficient--;
        if (($_month - 1) % 2 === 0 || $helper === 1) {
            $this->sumday += ($helper - 1) * 30 + $coefficient * ($helper * 31) + $leapYear;
        } else
            $this->sumday += ($helper - 1) * 30 + ($helper + 1) * 31 + $leapYear;
        $this->sumday += intval(($_year - 1) / 4) * 366;
        $this->sumday += (($_year - 1) - intval(($_year - 1) / 4)) * 365;
        return 0;
    }

    private function convertToDate(int $num): array
    {
        $massDate = ['day' => 0, 'month' => 0, 'year' => 0];
        $leapYear = intval($this->year / 4);
        $num -= 366 * $leapYear;
        if ($num % 365 !== 0) $leapYear++;
        $massDate['year'] = intval(($num / 365) + $leapYear);
        $difference = 0;
        $differenceFrom = 0;
        if ($num % 365 > 59) {
            $difference = 28;
            $differenceFrom = 1;
        }
        if ((($num % 365)) < 31)
            $massDate['month'] = 1;
        else
            $massDate['month'] = intval(((($num % 365) - $difference) / 31) + $differenceFrom);
        $massDate['day'] = (($num % 365) - $difference) % 31;
       return $massDate;
    }

    private function examSymbol(int $_day, int $_month): bool
    {
        return $_day > 31 && $_month > 12;
    }

    private function examinationForLetter(string $_letter): bool
    {
        return $_letter === 'ru' || $_letter === 'en';
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
        return implode($this->letter, $massDate);
    }
}

$date = new Date(1, 2,1 );
$date2 = new Date(1, 2, 2);
echo $date->sumday."\n";
echo $date->format('en')."\n";
echo $date->getDate()."\n";
echo $date->diffDay($date2)."\n";
echo $date->minusDay(5)."\n";
echo $date->getDateOfWeek()."\n";
