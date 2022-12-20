<?php

class Date
{
    public int $year;
    public int $month;
    public int $day;
    public int $sumday;
    public string $letter = '.';

    public function __construct(int $hDay, int $hMonth, int $hYear)
    {
        if ($this->examSymbol($hDay, $hMonth)) {
            $this->month = 3;
            $this->day = 3;
            $this->year = 3;
        } else {
            $this->year = $hYear;
            $this->month = $hMonth;
            $this->day = $hDay;
        }
        $this->sumday = $hDay;
        $this->convertToDay($hMonth, $hYear);
    }

    public function convertToDay(int $hMonth, int $hYear): int
    {
        $helper = intval(($hMonth - 1) / 2);
        if ($helper === 0) $helper++;
        $leapYear = 28;
        if ($hYear % 4 === 0)
            $leapYear = 29;
        if ($hMonth <= 2)
            $leapYear = 0;
        $coefficient = 1;
        if ($hMonth - 1 === 0) $coefficient--;
        if (($hMonth - 1) % 2 === 0 || $helper === 1) {
            $this->sumday += ($helper - 1) * 30 + $coefficient * ($helper * 31) + $leapYear;
        } else
            $this->sumday += ($helper - 1) * 30 + ($helper + 1) * 31 + $leapYear;
        $this->sumday += intval(($hYear - 1) / 4) * 366;
        $this->sumday += (($hYear - 1) - intval(($hYear - 1) / 4)) * 365;
        return 0;
    }

    public function convertToDate(int $num): array
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

    public function examSymbol(int $hDay, int $hMonth): bool
    {
        return $hDay > 31 && $hMonth > 12;
    }

    public function examinationForLetter(string $hLetter): bool
    {
        return $hLetter === 'ru' || $hLetter === 'en';
    }

    public function diffDay(self $hDate): int
    {
        if ($this->sumday > $hDate->sumday)
            return $this->sumday - $hDate->sumday;
        return $hDate->sumday - $this->sumday;
    }

    public function format(string $hLetter): string
    {
        if (!$this->examinationForLetter($hLetter))
            return 'invalid value';
        if ($hLetter === 'ru') {
            $this->letter = '.';
        } else
            $this->letter = '-';
        return $this->getDate();
    }

    public function minusDay(int $number): string
    {
        $result = $this->sumday - $number;
        $hDate = implode($this->letter, $this->convertToDate($result));
        return $hDate;
    }

    public function getDateOfWeek(): string
    {
        $num = $this->sumday;
        $a = intval($this->year / 4);
        $num -= 366 * $a;
        $b = 0;
        if ($num % 365 > 59) $b = 28;
        $key = ((($num % 365) - $b) % 31) % 7;
        $massOfWeek = ['', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        return $massOfWeek[$key];
    }

    public function getDate(): string
    {
        $massDate = ['day' => $this->day, 'month' => $this->month, 'year' => $this->year];
        return implode($this->letter, $massDate);
    }
}
