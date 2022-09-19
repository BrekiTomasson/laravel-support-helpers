<?php

declare(strict_types = 1);

namespace BrekiTomasson\Support;

use Illuminate\Support\Collection;
use InvalidArgumentException;

class Num
{
    /** Returns a 'clean' version of a numeric input, casting to int or float accordingly. */
    public static function clean(int|float|string $value): int|float
    {
        if (! is_numeric($value)) {
            throw new InvalidArgumentException($value . ' is not numeric.');
        }

        if (self::decimal($value) === 0) {
            return (int) $value;
        }

        return (float) $value;
    }

    /** Return the decimal portion of a number as an integer. Returns 0 if input is an integer. */
    public static function decimal(float|int|string $value): int
    {
        /* @noinspection PrintfScanfArgumentsInspection */
        return sscanf((string) self::clean($value), '%d.%d')[1] ?? 0;
    }

    /** @return Collection<int, int> */
    public static function factors(int $value): Collection
    {
        $factors = [];

        for ($iteration = 2; $iteration < $value; $iteration++) {
            if ($value % $iteration === 0) {
                $factors[] = $iteration;
            }
        }

        return collect($factors);
    }

    /** Checks if a number is between two other numbers. Inclusive by default. */
    public static function inRange(int|float|null $value, int|float $lower_bound, int|float $upper_bound, bool $inclusive = true): bool
    {
        if ($value === null) {
            return false;
        }

        return $inclusive
            ? $value >= $lower_bound && $value <= $upper_bound
            : $value > $lower_bound  && $value < $upper_bound;
    }

    /** Return the integer portion of a number. */
    public static function integer(float|int|string $value): int
    {
        /* @noinspection PrintfScanfArgumentsInspection */
        return sscanf((string) self::clean($value), '%d.%d')[0] ?? 0;
    }

    /** @return float */
    public static function percentOf(int|float $value, int|float $total): float
    {
        return $value / $total * 100;
    }

    /**
     * Round a number to the nearest fractional part of 1.
     *
     * @example Num::roundToPart(12.3, 4) => 12.25
     * @example Num::roundToPart(12.3, 3) => 12.333333333333
     */
    public static function roundToPart(int|float $value, int $parts): float
    {
        return round($value * $parts) / $parts;
    }

    /**
     * Test whether a number is within a range defined as X greater or lower than another number. Inclusive by default.
     *
     * @example withinRange(5, 10, 2)  ==> false (as 5 is not between 8 and 12)
     * @example withinRange(11, 13, 5) ==> true (as 11 is between 8 and 18)
     */
    public static function withinRange(int|float|null $value, int|float $comparison, int $range, bool $inclusive = true): bool
    {
        return self::inRange($value, $comparison - $range, $comparison + $range, $inclusive);
    }
}
