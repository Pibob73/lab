<?php

class Date
{
    private int $year;
    private int $month;
    private int $day;
    public int $sumday;

    public function __construct(int $_day, int $_month, int $_year)
    {
        $this->year = $_year;
        $this->month = $_month;
        $this->day = $_day;
        $this->sumday = $_day;
        convertToDay($_month, $_year);
    }

    private function convertToDay(int $_month, int $_year)
    {
        $h = intval(($_month - 1) / 2);
        $a = 28;
        if ($_year % 4 === 0)
            $a = 29;
        if ($_month <= 2)
            $a = 0;
        if (($_month - 1) % 2 !== 0) {
            $this->sumday += ($h - 1) * 30 + $h * 31 + $a;
        } else
            $this->sumday += ($h - 1) * 30 + ($h + 1) * 31 + $a;
    }
}

$date = new Date(2, 6, 8);
echo $date->sumday;