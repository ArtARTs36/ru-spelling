<?php

namespace ArtARTs36\RuSpelling;

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
        'Январь',
        'Январь',
        'Февраль',
        'Март',
        'Апрель',
        'Май',
        'Июнь',
        'Июль',
        'Август',
        'Сентябрь',
        'Октябрь',
        'Ноябрь',
        'Декабрь',
    ];

    public const GENITIVES = [
        'Января',
        'Января',
        'Февраля',
        'Марта',
        'Апреля',
        'Мая',
        'Июня',
        'Июля',
        'Августа',
        'Сентября',
        'Октября',
        'Ноября',
        'Декабря',
    ];

    public const DATIVES = [
        'Январю',
        'Январю',
        'Февралю',
        'Марту',
        'Апрелю',
        'Маю',
        'Июню',
        'Июлю',
        'Августу',
        'Сентябрю',
        'Октябрю',
        'Ноябрю',
        'Декабрю',
    ];

    public const ACCUSATIVES = [
        'Январь',
        'Январь',
        'Февраль',
        'Март',
        'Апрель',
        'Май',
        'Июнь',
        'Июль',
        'Август',
        'Сентябрь',
        'Октябрь',
        'Ноябрь',
        'Декабрь',
    ];

    public const INSTRUMENTALS = [
        'Январем',
        'Январем',
        'Февралем',
        'Мартом',
        'Апрелем',
        'Маем',
        'Июнем',
        'Июлем',
        'Августом',
        'Сентябрем',
        'Октябрем',
        'Ноябрем',
        'Декабрем',
    ];

    public const PREPOSITIONALS = [
        'Январе',
        'Январе',
        'Феврале',
        'Марте',
        'Апреле',
        'Мае',
        'Июне',
        'Июле',
        'Августе',
        'Сентябре',
        'Октябре',
        'Ноябре',
        'Декабре',
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

    protected static function parseDate($dateOrMonth): int
    {
        if ($dateOrMonth instanceof \DateTimeInterface) {
            return (int) $dateOrMonth->format('m');
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
