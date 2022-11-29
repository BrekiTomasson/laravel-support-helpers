<?php

declare(strict_types=1);

use BrekiTomasson\Support\Num;

it('returns the integer value correctly for floats')
    ->expect(fn () => Num::integer(123.45))
    ->toBeInt()
    ->toBe(123);

it('returns the integer value correctly for integers')
    ->expect(fn () => Num::integer(123))
    ->toBeInt()
    ->toBe(123);
