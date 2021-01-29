<?php

namespace ArtARTs36\RuSpelling;

class People
{
    public $family;

    public $name;

    public $patronymic;

    public function __construct(string $family, string $name, ?string $patronymic = null)
    {
        $this->family = $family;
        $this->name = $name;
        $this->patronymic = $patronymic;
    }

    public static function fromFio(string $fio, string $separator = ' '): ?People
    {
        $parts = explode($separator, $fio);
        $count = count($parts);

        if ($count === 1 || $count > 3) {
            return null;
        }

        return new static(...$parts);
    }
}
