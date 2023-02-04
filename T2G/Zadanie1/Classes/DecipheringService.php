<?php
namespace T2G\Zadanie1\Classes;

use T2G\Zadanie1\Interfaces\CipherInterface;

class DecipheringService
{

    private CipherInterface $someDeCipheringClass;

    public function __construct(CipherInterface $someDeCipheringClass)
    {
        $this->someDeCipheringClass = $someDeCipheringClass;
    }

    public function transformText(string $text, string $method): string
    {
        $method = strtolower($method);

        return match ($method) {
            'cipher' => htmlspecialchars($this->someDeCipheringClass->cipher($text)),
            'decipher' => $this->someDeCipheringClass->decipher(htmlspecialchars_decode($text)),
            default => 'Chosen method does not exist',
        };

    }


}