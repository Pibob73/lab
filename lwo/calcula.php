<?php
function compare(string $value): bool
{
    $ofNumber = is_numeric($value);
    return $ofNumber || $value === '+' || $value === '-';
}

function separatly(array $argv): string
{
    $expression = $argv[1];
    foreach ($argv as $key => $value) {
        if ($key > 1)
            $expression .= ' ' . $value;
    }
    return $expression;
}

function calculator(string $value): string
{
    $massOfLetters = explode(' ', $value);

    $sum = 0;
    foreach ($massOfLetters as $key => $value) {
        if (compare($value)) {
            if ($massOfLetters[$key - 1] === '-' and $key != 0)
                $value *= -1;
            if (is_numeric($value))
                $sum += $value;
        } else return 'invalid value';
    }
    return $sum;
}

$value = separatly($argv);
echo calculator($value), "\n";
