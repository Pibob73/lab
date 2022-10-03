<?php
function sumTime(string $timeOne, string $timeTwo): string
{
    $timeOne = explode(':', $timeOne);
    $timeTwo = explode(':', $timeTwo);
    echo $timeOne . "\n" . $timeTwo;
    $masssum = ['hour' => 0, 'minute' => 0, 'second' => 0];
    $key = 2;
    end($masssum);
    while ($key != -1) {
        $masssum[key($masssum)] = $timeOne[$key] + $timeTwo[$key];
        if (key($masssum) != 'hour') {
            if ($masssum[key($masssum)] >= 60) {
                $masssum[key($masssum)] = $masssum[key($masssum)] - 60;
                $timeOne[$key - 1] += 1;
            }
        } else {
            if ($masssum[key($masssum)] >= 24)
                $masssum[key($masssum)] = $masssum[key($masssum)] - 24;
        }
        prev($masssum);
        $key--;
    }
    return implode(':', $masssum);
}

echo sumTime($argv[1], $argv[2]) . "\n";
