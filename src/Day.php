<?php

namespace ArtARTs36\RuSpelling;

class Day
{
    public const MONDAY = 'Понедельник';
    public const TUESDAY = 'Вторник';
    public const WEDNESDAY = 'Среда';
    public const THURSDAY = 'Четверг';
    public const FRIDAY = 'Пятница';
    public const SATURDAY = 'Суббота';
    public const SUNDAY = 'Воскресение';

    public const DAYS = [
        self::MONDAY,
        self::MONDAY,
        self::TUESDAY,
        self::WEDNESDAY,
        self::THURSDAY,
        self::FRIDAY,
        self::SATURDAY,
        self::SUNDAY,
    ];

    /**
     * @param \DateTimeInterface|int $date
     * @return string
     */
    public static function getDayOfWeek($date): string
    {
        return static::DAYS[static::parseDate($date)];
    }

    public static function getCurrentDayOfWeek(): string
    {
        return static::DAYS[static::getCurrentDayNumber()];
    }

    public static function getCurrentDayNumber(): int
    {
        return (int) date('N');
    }

    /**
     * @param \DateTimeInterface|int $date
     * @return int
     */
    protected static function parseDate($date): int
    {
        if ($date instanceof \DateTimeInterface) {
            return static::getDayNumberOfDate($date);
        }

        return (int) $date;
    }

    protected static function getDayNumberOfDate(\DateTimeInterface $date): int
    {
        return (int) $date->format('N');
    }
}
