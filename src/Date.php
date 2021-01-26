<?php

namespace ArtARTs36\RuSpelling;

class Date
{
    public static function defaultFormat(\DateTimeInterface $date): string
    {
        return implode(' ', [
            (int) $date->format('d'),
            Month::getGenitiveName($date),
            $date->format('Y'),
            'г',
        ]);
    }
}
