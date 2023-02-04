<?php
require(__DIR__.'/LCD.php');
use T2G\Zadanie2\LCD;

$lcd = new LCD();

echo $lcd->parseInputToDigits('123456676534368789787764');