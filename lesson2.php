<?php
require('src/functions.php');
echo "<h3>Задание 1</h3>";

echo task1([1,2,4,5]);

echo "<p> ************* </p>";

task1([1,2,4,5], false);

echo "<h3>Задание 2</h3>";

echo task2("*", 1,2,4,6);

echo "<p> ************* </p>";

echo "<h3>Задание 3</h3>";

task3(5, 5);

echo "<p> ************* </p>";

echo "<h3>Задание 4</h3>";

date_default_timezone_set('Europe/Moscow');
echo "<p>". date('d.m.Y H:i'). "</p>";
echo "<p>". strtotime('24.02.2016 00:00:00'). "</p>";
echo "<p> ************* </p>";

echo "<h3>Задание 5</h3>";

$string = 'Карл у Клары украл Кораллы';
echo "<p>". str_replace('К', '', $string). "</p>";
echo '<br>';

$string = 'Две бутылки лимонада';
echo "<p>". str_replace('Две', 'Три', $string). "</p>";

echo "<p> ************* </p>";

echo "<h3>Задание 6</h3>";
file_put_contents('test.txt', 'Hello again!');


echo task6('test.txt');

echo "<p> ************* </p>";