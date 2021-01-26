<?php

namespace ArtARTs36\RuSpelling\Tests;

use ArtARTs36\RuSpelling\Date;
use PHPUnit\Framework\TestCase;

class DateTest extends TestCase
{
    public function defaultFormatDataProvider(): array
    {
        return [
            [
                '1 Августа 2020 г',
                new \DateTime('2020-08-01'),
                true,
            ],
            [
                '1 Августа 2020 г',
                new \DateTime('2020-08-02'),
                false,
            ],
            [
                '3 Сентября 2020 г',
                new \DateTime('2020-09-03'),
                true,
            ],
            [
                '3 Сентября 2020 г',
                new \DateTime('2020-09-13'),
                false,
            ],
        ];
    }

    /**
     * @dataProvider defaultFormatDataProvider
     * @covers \ArtARTs36\RuSpelling\Date::defaultFormat
     */
    public function testDefaultFormat(string $given, \DateTimeInterface $date, bool $equals): void
    {
        self::assertTrue(($given === Date::defaultFormat($date)) === $equals);
    }
}
