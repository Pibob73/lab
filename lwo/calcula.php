<?php
function compare(string $value): bool
{
    $ofnumber = is_numeric($value);
    return $ofnumber or $value === '+' or $value === '-';
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
    $massofletters = explode(' ', $value);

    $sum = 0;
    foreach ($massofletters as $key => $value) {
        if (compare($value)) {
            if ($massofletters[$key - 1] === '-' and $key != 0)
                $value *= -1;
            if (is_numeric($value))
                $sum += $value;
        } else return 'invalid value';
    }
    return $sum;
}

$value = separatly($argv);
echo calculator($value), "\n";
?>
