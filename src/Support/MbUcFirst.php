<?php

namespace ArtARTs36\RuSpelling\Support;

class MbUcFirst
{
    public static function handle(string $str): string
    {
        $str = trim($str);

        $first = mb_strtoupper(mb_substr($str, 0, 1));

        return $first . mb_substr($str, 1);
    }
}

