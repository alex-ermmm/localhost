<?php
// Задание #1
function task1(array $strings, bool $return = true)
{
    $result = implode("\n", array_map(function (string $str) {
        return "<p>$str</p>";
    }, $strings));

    if ($return) {
        return $result;
    }
    echo $result;
}


function task2(string $operator, ...$numbers)
{
    switch ($operator) {
        case '+':
            return array_sum($numbers);
        case '-':
            return array_shift($numbers) - array_sum($numbers);
        case '/':
            $result = array_shift($numbers);
            foreach ($numbers as $number) {
                $result = $result / $number;
            }
            return $result;
        case '*':
            $result = 1;
            foreach ($numbers as $number) {
                $result = $result * $number;
            }
            return $result;
    }
}


function task3(int $a, int $b)
{
    $result = '<table>';
    for ($i = 1; $i <= $a; $i++) {
        $result .= '<tr>';
        for ($j = 1; $j <= $b; $j++) {
            $result .= '<td>';
            $result .= " $i " . " * " . " $j " . " = " . $i * $j;
            $result .= '</td>';
        }
        $result .= '</tr>';
    }
    $result .= '</table>';
    echo $result;
}

function task6(string $filename)
{
    $file = fopen($filename, 'r');
    if (!$file) {
        return false;
    }

    $data = fgets($file, 1024);
    echo $data;
}