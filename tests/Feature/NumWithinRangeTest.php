<?php

declare(strict_types=1);

use BrekiTomasson\Support\Num;

it('returns false if null is entered as a value')
    ->expect(fn () => Num::withinRange(null, 5, 2))
    ->toBeBool()
    ->toBe(false);

it('correctly calculates inclusive ranges when true')
    ->expect(fn () => Num::withinRange(5, 7, 2))
    ->toBeBool()
    ->toBe(true);

it('correctly calculates inclusive ranges when false')
    ->expect(fn () => Num::withinRange(7, 5, 1))
    ->toBeBool()
    ->toBe(false);

it('correctly calculates exclusive ranges when false')
    ->expect(fn () => Num::withinRange(4, 7, 2, false))
    ->toBeBool()
    ->toBe(false);

it('correctly calculates exclusive ranges when true')
    ->expect(fn () => Num::withinRange(6, 7, 2, false))
    ->toBeBool()
    ->toBe(true);
