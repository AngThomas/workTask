<?php

namespace T2G\Zadanie1\Classes;

use T2G\Zadanie1\Interfaces\CipherInterface;

class DeCipherer implements CipherInterface
{
    private const DISCRIMINATE_ASCII_VALUE = 97;
    public static array $legalCipherKeys = [
        '!', ')', '"', '(', '£', '*', '%', '&', '>', '<', '@', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o'
    ];

    public function cipher(string $textToCipher): string
    {
        $characters = mb_str_split($textToCipher);
        $ciphered = '';
        foreach ($characters as $character) {
            if (!(mb_ord($character) >= 96 && mb_ord($character) <= 122)) {
                $ciphered .= $character;
            } else{
                $keyPos = mb_ord($character) - self::DISCRIMINATE_ASCII_VALUE;
                $ciphered .= self::$legalCipherKeys[$keyPos];
            }
        }
        return $ciphered;
    }

    public function decipher(string $textToDecipher): string
    {
        $characters = mb_str_split($textToDecipher);
        $deciphered = '';
        foreach ($characters as $character) {
            if (in_array($character, self::$legalCipherKeys, true)) {
                $deciphered .= mb_chr(self::DISCRIMINATE_ASCII_VALUE + (int)array_flip(self::$legalCipherKeys)[$character]);
            } else {
                $deciphered .= $character;
            }
        }
        return $deciphered;
    }
}
