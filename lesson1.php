<h2> домашнее задание #1 </h2>

<h3>Задание #1</h3>
<?
$name = "Александр";
$age = 40;
echo "<p> Меня зовут:" . $name . "</p>";
echo "<p> Мне " . $age . " лет </p>";
echo "\" ! | / \" ";

echo "<p> ---------------------------------------- </p>";
?>
<h2>Задание #2</h2>

Дана задача:

На школьной выставке 80 рисунков. 23 из них выполнены фломастерами, 40 карандашами, а остальные — красками. Сколько рисунков, выполненные красками, на школьной выставке?
Описать и вывести условия, решение этой задачи на PHP. Все предоставленные числа из пункта 1 должны быть указаны в константах.

<?php
define("TOTAL_PICTURES", 80);
define("MARKERS_PICTURES", 23);
define("PENCIL_PICTURES", 40);

$paint_picture = TOTAL_PICTURES - MARKERS_PICTURES - PENCIL_PICTURES;
echo "<p>" . $paint_picture . " рисунков, выполненные красками, на школьной выставке. </p>";
echo "<p> ---------------------------------------- </p>";
?>
<h2> Задание #3 </h2>
<?
$age = rand(1, 100);

echo $age;


if ($age > 18 && $age < 65) {
    echo "<p> Вам еще работать и работать </p>";
} elseif ($age > 65) {
    echo "<p>Вам пора на пенсию </p>";
} elseif ($age <= 17) {
    echo "<p>Вам ещё рано работать </p>";
} else {
    echo "<p>Неизвестный возраст</p>";
}
?>
<p> ---------------------------------------- </p>
<h2> Задание #4</h2>
<?
$day = rand(1, 10);
switch ($day) {
    case 0:
    case 1:
    case 2:
    case 3:
    case 4:
        echo "<p> Это рабочий день (" . $day . ") </p>";
        break;
    case 5:
    case 6:
        echo "<p> Это выходной день  (" . $day . ")</p>";
        break;
    default:
        echo "<p> Неизвестный день  (" . $day . ")</p>";
} ?>
<p> ---------------------------------------- </p>
<h2> Задание #5</h2>
<?

$bmw = [
    "model" => "X5",
    "speed" => 120,
    "doors" => 5,
    "year" => 2015
];
$toyota = [
    "model" => "Corolla",
    "speed" => 100,
    "doors" => 5,
    "year" => 2016
];
$opel = [
    "model" => "Astra",
    "speed" => 140,
    "doors" => 5,
    "year" => 2020
];


$cars = [
    'bmw' => $bmw,
    'toyota' => $toyota,
    'opel' => $opel
];

foreach ($cars as $model => $car) {
    echo "<p> CAR " . $model . "</p>";
    echo "<p>" . $car['model'] . " " . $car['speed'] . " " . $car['doors'] . " " . $car['year'] . "</p>";
}
?>
<p> ---------------------------------------- </p>

<h2> Задание #6</h2>
<table>
    <?
	$row_max = 10;
    $col_max = 10;

    for ($tr = 1; $tr <= $row_max; $tr++) {
        echo "<tr>";
        for ($td = 1; $td <= $col_max; $td++) {
            if ($td % 2 === 0 && $tr % 2 === 0) {
                echo "<td> (" . $tr . " * " . $td . " = " . $tr * $td . " ) </td>";
            } else {
                echo "<td> [ " . $tr . " * " . $td . " = " . $tr * $td . " ] </td>";
            }
        }
        echo "</tr>";
    }
    ?>
</table>
<p> ---------------------------------------- </p>