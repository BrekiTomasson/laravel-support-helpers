<?php

declare(strict_types=1);

use BrekiTomasson\Support\Num;

it('understands integers')
    ->expect(fn () => Num::clean(19))
    ->toBeInt()
    ->toBe(19);

it('understands floats')
    ->expect(fn () => Num::clean(23.42))
    ->toBeFloat()
    ->toBe(23.42);

it('understands integers passed as strings')
    ->expect(fn () => Num::clean('420'))
    ->toBeInt()
    ->toBe(420);

it('understands floats passed as strings')
    ->expect(fn () => Num::clean('592.222'))
    ->toBeFloat()
    ->toBe(592.222);

it('returns integers when decimal values of floats are zero')
    ->expect(fn () => Num::clean(234.00))
    ->toBeInt()
    ->toBe(234);

it('returns integers when decimal values of floats passed as strings are zero')
    ->expect(fn () => Num::clean('999.00'))
    ->toBeInt()
    ->toBe(999);

it('understands integers passed as strings with comma-separated thousands')
    ->expect(fn () => Num::clean('1,000,000'))
    ->toBeInt()
    ->toBe(1_000_000);

it('understands a dollar-sign input string')
    ->expect(fn () => Num::clean('$3,449.99'))
    ->toBeFloat()
    ->toBe(3449.99);

it('throws exceptions on non-numeric strings', fn () => Num::clean('a string'))
    ->throws(InvalidArgumentException::class);
