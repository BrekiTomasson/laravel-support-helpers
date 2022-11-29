<?php

declare(strict_types=1);

use BrekiTomasson\Support\Num;

it('correctly rounds to the nearest whole number')
    ->expect(fn () => Num::roundToPart(123.70, 1))
    ->toBeInt()
    ->toBe(124);

it('correctly rounds to nearest half')
    ->expect(fn () => Num::roundToPart(123.45, 2))
    ->toBeFloat()
    ->toBe(123.5);

it('correctly rounds to nearest quarter')
    ->expect(fn () => Num::roundToPart(12.34, 4))
    ->toBeFloat()
    ->toBe(12.25);

it('correctly rounds to the nearest tenth')
    ->expect(fn () => Num::roundToPart(12.34, 10))
    ->toBeFloat()
    ->toBe(12.3);
