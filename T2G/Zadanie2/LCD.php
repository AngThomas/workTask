<?php

namespace T2G\Zadanie2;
class LCD
{
    private const
        SPACE           = '   ',
        FLOOR           = ' _ ',
        PIPE            = '  |',
        DOUBLE_PIPE     = '| |',
        FLOOR_PIPE      = ' _|',
        PIPE_FLOOR      = '|_ ',
        OPEN_TOP        = '|_|';


    private static array $digits = [
        [self::FLOOR, self::DOUBLE_PIPE, self::OPEN_TOP],
        [self::SPACE, self::PIPE, self::PIPE],
        [self::FLOOR, self::FLOOR_PIPE, self::PIPE_FLOOR],
        [self::FLOOR, self::FLOOR_PIPE, self::FLOOR_PIPE],
        [self::SPACE, self::OPEN_TOP, self::PIPE],
        [self::FLOOR, self::PIPE_FLOOR, self::FLOOR_PIPE],
        [self::FLOOR, self::PIPE_FLOOR, self::OPEN_TOP],
        [self::FLOOR, self::PIPE, self::PIPE],
        [self::FLOOR, self::OPEN_TOP, self::OPEN_TOP],
        [self::FLOOR, self::OPEN_TOP, self::FLOOR_PIPE],
    ];

    private function checkIfTextIsDigits(string $text): bool
    {
        foreach (str_split($text) as $character) {
            if (!is_numeric($character)) {
                return false;
            }
        }
        return true;
    }

    public function parseInputToDigits($text): string
    {
        $output = '';
        $noSpaceText = str_replace(' ', '', $text);

        if (!$this->checkIfTextIsDigits($noSpaceText)) {
            return "Input does not consist entirely out of digits!";
        }

        for( $i=0;$i<3;$i++) {
            foreach (str_split($noSpaceText) as $character) {
                $output .= self::$digits[$character][$i];
            }
            $output .= '<br>';
        }
        return "<pre>".$output."</pre>";
    }
}

