<?php
namespace T2G\Zadanie1\Interfaces;

interface CipherInterface
{
    public function cipher(string $textToCipher): string;
    public function decipher(string $textToDecipher): string;
}