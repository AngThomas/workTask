<?php

require(__DIR__.'/Interfaces/CipherInterface.php');
require(__DIR__.'/Classes/DeCipherer.php');
require(__DIR__.'/Classes/DecipheringService.php');


use T2G\Zadanie1\Classes\DeCipherer;
use T2G\Zadanie1\Classes\DecipheringService;

$deCipherer  = new DeCipherer();
$decipheringService = new DecipheringService($deCipherer);

echo 'Tekst do rozszyfrowania: )g!ld, j(!ad "> h>£ gdol>!o!" o!(!c>£';
echo '<br>';
echo $decipheringService->transformText(')g!ld, j(!ad "> h>£ gdol>!o!" o!(!c>£', 'decipher');
echo '<br>';
$geslaJazn = 'zażółć gęślą jaźń';
echo 'Tekst do zaszyfrowania i rozszyfrowania: '.$geslaJazn;
echo '<br>';
$cipheredText = $decipheringService->transformText($geslaJazn, 'cipher');
echo $cipheredText.'<br>';
echo $decipheringService->transformText($cipheredText, 'decipher');