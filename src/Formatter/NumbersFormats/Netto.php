<?php

namespace ArtARTs36\RuSpelling\Formatter\NumbersFormats;

use ArtARTs36\RuSpelling\Contracts\NumberFormat;

class Netto implements NumberFormat
{
    public const NAME = 'netto';

    public function to($number): string
    {
        $intPart = (int) $number;

        if ($number == $intPart) {
            return $intPart. ',00';
        }

        return str_replace('.', ',', $number);
    }
}
