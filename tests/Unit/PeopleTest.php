<?php

namespace ArtARTs36\RuSpelling\Tests;

use ArtARTs36\RuSpelling\People;
use PHPUnit\Framework\TestCase;

class PeopleTest extends TestCase
{
    /**
     * @covers \ArtARTs36\RuSpelling\People::fromFio
     */
    public function testFromFio(): void
    {
        $fio = "Иванов Иван Иванович";
        $people = People::fromFio($fio);

        self::assertNotNull($people);
        self::assertEquals('Иванов', $people->family);
        self::assertEquals('Иван', $people->name);
        self::assertEquals('Иванович', $people->patronymic);

        //

        $fio = "Иванов Иван";
        $people = People::fromFio($fio);

        self::assertNotNull($people);
        self::assertEquals('Иванов', $people->family);
        self::assertEquals('Иван', $people->name);
        self::assertNull($people->patronymic);

        //

        $fio = "Иванов";

        self::assertNull(People::fromFio($fio));

        //

        $fio = "1 2 3 4";

        self::assertNull(People::fromFio($fio));
    }
}
