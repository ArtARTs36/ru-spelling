<?php

namespace ArtARTs36\RuSpelling\Formatter;

use ArtARTs36\RuSpelling\Contracts\NumberFormat;
use ArtARTs36\RuSpelling\Formatter\NumbersFormats\FormatFactory;

/**
 * @method static string toNetto(int|float $number)
 */
class NumberFormatter
{
    protected $number;

    public function __construct($number)
    {
        $this->number = $number;
    }

    public static function __callStatic($name, $arguments)
    {
        if (strpos($name, 'to') === 0 && count($arguments) === 1) {
            return (new static($arguments[0]))->format(
                FormatFactory::get(mb_strtolower(mb_substr($name, 2)))
            );
        }

        throw new \BadMethodCallException();
    }

    public function format(NumberFormat $format): string
    {
        return $format->to($this->number);
    }
}
