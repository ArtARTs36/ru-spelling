<?php

namespace ArtARTs36\RuSpelling;

class Text
{
    public static function translitToEng(string $text): string
    {
        return strtr($text, Letter::MAP_ENG);
    }
}
