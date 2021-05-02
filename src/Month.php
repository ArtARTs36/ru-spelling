<?php

namespace ArtARTs36\RuSpelling;

use ArtARTs36\RuSpelling\Support\MbUcFirst;

/**
 * @method static string getNominativeName(\DateTimeInterface|int $dateOrMonth)
 * @method static string getGenitiveName(\DateTimeInterface|int $dateOrMonth)
 * @method static string getDativeName(\DateTimeInterface|int $dateOrMonth)
 * @method static string getAccusativeName(\DateTimeInterface|int $dateOrMonth)
 * @method static string getInstrumentalName(\DateTimeInterface|int $dateOrMonth)
 * @method static string getPrepositionalName(\DateTimeInterface|int $dateOrMonth)
 */
class Month
{
    public const NOMINATIVES = [
        1 => 'Январь',
        2 => 'Февраль',
        3 => 'Март',
        4 => 'Апрель',
        5 => 'Май',
        6 => 'Июнь',
        7 => 'Июль',
        8 => 'Август',
        9 => 'Сентябрь',
        10 => 'Октябрь',
        11 => 'Ноябрь',
        12 => 'Декабрь',
    ];

    public const GENITIVES = [
        1 => 'Января',
        2 => 'Февраля',
        3 => 'Марта',
        4 => 'Апреля',
        5 => 'Мая',
        6 => 'Июня',
        7 => 'Июля',
        8 => 'Августа',
        9 => 'Сентября',
        10 => 'Октября',
        11 => 'Ноября',
        12 => 'Декабря',
    ];

    public const DATIVES = [
        1 => 'Январю',
        2 => 'Февралю',
        3 => 'Марту',
        4 => 'Апрелю',
        5 => 'Маю',
        6 => 'Июню',
        7 => 'Июлю',
        8 => 'Августу',
        9 => 'Сентябрю',
        10 => 'Октябрю',
        11 => 'Ноябрю',
        12 => 'Декабрю',
    ];

    public const ACCUSATIVES = [
        1 => 'Январь',
        2 => 'Февраль',
        3 => 'Март',
        4 => 'Апрель',
        5 => 'Май',
        6 => 'Июнь',
        7 => 'Июль',
        8 => 'Август',
        9 => 'Сентябрь',
        10 => 'Октябрь',
        11 => 'Ноябрь',
        12 => 'Декабрь',
    ];

    public const INSTRUMENTALS = [
        1 => 'Январем',
        2 => 'Февралем',
        3 => 'Мартом',
        4 => 'Апрелем',
        5 => 'Маем',
        6 => 'Июнем',
        7 => 'Июлем',
        8 => 'Августом',
        9 => 'Сентябрем',
        10 => 'Октябрем',
        11 => 'Ноябрем',
        12 => 'Декабрем',
    ];

    public const PREPOSITIONALS = [
        1 => 'Январе',
        2 => 'Феврале',
        3 => 'Марте',
        4 => 'Апреле',
        5 => 'Мае',
        6 => 'Июне',
        7 => 'Июле',
        8 => 'Августе',
        9 => 'Сентябре',
        10 => 'Октябре',
        11 => 'Ноябре',
        12 => 'Декабре',
    ];

    protected const CASES = [
        'nominative' => self::NOMINATIVES,
        'genitive' => self::GENITIVES,
        'dative' => self::DATIVES,
        'accusative' => self::ACCUSATIVES,
        'instrumental' => self::INSTRUMENTALS,
        'prepositional' => self::PREPOSITIONALS,
    ];

    public static function __callStatic($name, $arguments)
    {
        if (($case = str_replace(['get', 'Name'], '', $name)) && $case !== $name && count($arguments) === 1) {
            return static::getName($case, static::parseDate($arguments[0]));
        }

        throw new \BadMethodCallException();
    }

    public static function getNumberFromName(string $name): ?int
    {
        $name = MbUcFirst::handle(mb_strtolower($name));

        foreach (static::CASES as $case) {
            if (in_array($name, $case)) {
                return array_search($name, $case);
            }
        }

        return null;
    }

    protected static function parseDate($dateOrMonth): int
    {
        if ($dateOrMonth instanceof \DateTimeInterface) {
            return (int) $dateOrMonth->format('m');
        }

        if ($dateOrMonth < 1) {
            return 1;
        }

        return (int) $dateOrMonth;
    }

    protected static function getName(string $case, int $month): string
    {
        $case = mb_strtolower($case);

        if (! isset(static::CASES[$case])) {
            throw new \LogicException('Incorrect Case!');
        }

        return static::CASES[$case][$month];
    }
}
