<?php

namespace ArtARTs36\RuSpelling\Tests;

use ArtARTs36\RuSpelling\Text;
use PHPUnit\Framework\TestCase;

class TextTest extends TestCase
{
    /**
     * @covers \ArtARTs36\RuSpelling\Text::translitToEng
     */
    public function testTranslitToEng(): void
    {
        self::assertEquals('Privet', Text::translitToEng('Привет'));
        self::assertEquals('Kak dela?', Text::translitToEng('Как дела?'));
    }
}
