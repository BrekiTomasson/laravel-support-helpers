<?php

declare(strict_types=1);

use BrekiTomasson\Support\Num;

it('returns the decimal value correctly')
    ->expect(fn () => Num::decimal(123.45))
    ->toBeInt()
    ->toBe(45);

it('returns zero for integers')
    ->expect(fn () => Num::decimal(123))
    ->toBeInt()
    ->toBe(0);

it('removes zero for whole numbers passed as a float')
    ->expect(fn () => Num::decimal(123.00))
    ->toBeInt()
    ->toBe(0);
