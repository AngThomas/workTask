<?php

include('/Users/michalkonik/PhpstormProjects/T2G/Zadanie1/Interfaces/CipherInterface.php');
include('/Users/michalkonik/PhpstormProjects/T2G/Zadanie1/Classes/DeCipherer.php');

use PHPUnit\Framework\TestCase;
use T2G\Zadanie1\Classes\DeCipherer;


class DeCiphererTest extends TestCase
{

    public static function provideCipherData(): array
    {
        return [

                 'Text is ciphered correctly set 0'  => ['abcdefghijklmnopqrstuvwxyz', '!)"(£*%&><@abcdefghijklmno'],
                 'Text is ciphered correctly set 1'  => ['zażółć gęślą jaźń', 'o!żółć %ęśaą <!źń'],
                 'Text is ciphered correctly set 2'  => ['polska to duzy kraj', 'edah@! id (jon @g!<'],

            ];

    }

    public static function provideDecipherData(): array
    {
        return [

            'Text is deciphered correctly set 0'  => [')g!ld, j(!ad "> h>£ gdol>!o!" o!(!c>£', 'brawo, udalo ci sie rozwiazac zadanie'],
            'Text is deciphered correctly set 1'  => ['!)"(£*%&><@abcdefghijklmno', 'abcdefghijklmnopqrstuvwxyz'],
            'Text is deciphered correctly set 2'  => ['o!żółć %ęśaą <!źń', 'zażółć gęślą jaźń'],
            'Text is deciphered correctly set 3'  => ['edah@! id (jon @g!<', 'polska to duzy kraj'],

        ];
    }

    /**
     * @dataProvider provideCipherData
     */
    public function testIfTextIsCipheredCorrectly($textToCipher, $expected) {
        $deCipherer = new DeCipherer();
        $this->assertSame($expected, htmlspecialchars_decode($deCipherer->cipher($textToCipher)));
    }

    /**
     * @dataProvider provideDecipherData
     */
    public function testIfTextIsDecipheredCorrectly($textToDecipher, $expected) {
        $deCipherer = new DeCipherer();
        $this->assertSame($expected, $deCipherer->decipher($textToDecipher));
    }

}