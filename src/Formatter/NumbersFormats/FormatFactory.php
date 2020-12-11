<?php

namespace ArtARTs36\RuSpelling\Formatter\NumbersFormats;

use ArtARTs36\RuSpelling\Contracts\NumberFormat;

class FormatFactory
{
    protected static $map = [
        Netto::NAME => Netto::class,
    ];

    public static function get(string $name): NumberFormat
    {
        if (! isset(static::$map[$name])) {
            throw new \LogicException('Unknown Format!');
        }

        $class = static::$map[$name];

        return new $class();
    }
}
