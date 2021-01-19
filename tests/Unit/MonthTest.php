<?php

namespace ArtARTs36\RuSpelling\Tests;

use ArtARTs36\RuSpelling\Month;
use PHPUnit\Framework\TestCase;

class MonthTest extends TestCase
{
    /**
     * @covers \ArtARTs36\RuSpelling\Month::getNominativeName
     */
    public function testGetNominativeName(): void
    {
        self::assertEquals('Январь', Month::getNominativeName(1));
        self::assertEquals('Январь', Month::getNominativeName($this->createDate(1)));

        self::assertEquals('Февраль', Month::getNominativeName(2));
        self::assertEquals('Февраль', Month::getNominativeName($this->createDate(2)));

        self::assertEquals('Март', Month::getNominativeName(3));
        self::assertEquals('Март', Month::getNominativeName($this->createDate(3)));

        self::assertEquals('Апрель', Month::getNominativeName(4));
        self::assertEquals('Апрель', Month::getNominativeName($this->createDate(4)));

        self::assertEquals('Май', Month::getNominativeName(5));
        self::assertEquals('Май', Month::getNominativeName($this->createDate(5)));
    }

    /**
     * @covers \ArtARTs36\RuSpelling\Month::getNumberFromName
     */
    public static function testGetNumberFromName(): void
    {
        self::assertEquals(1, Month::getNumberFromName('Январь'));
    }

    private function createDate(int $month): \DateTime
    {
        return (new \DateTime())->setDate(2020, $month, 1);
    }
}
