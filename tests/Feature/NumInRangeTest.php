<?php

use BrekiTomasson\Support\Num;

it('returns false if null is entered as a value')
    ->expect(fn () => Num::inRange(null, 1, 10))
    ->toBeBool()
    ->toBe(false);

it('correctly calculates inclusive ranges when true')
    ->expect(fn () => Num::inRange(5, 1, 5))
    ->toBeBool()
    ->toBe(true);

it('correctly calculates inclusive ranges when false')
    ->expect(fn () => Num::inRange(7, 1, 5))
    ->toBeBool()
    ->toBe(false);

it('correctly calculates exclusive ranges when false')
    ->expect(fn () => Num::inRange(5, 1, 5, false))
    ->toBeBool()
    ->toBe(false);

it('correctly calculates exclusive ranges when true')
    ->expect(fn () => Num::inRange(5, 1, 10, false))
    ->toBeBool()
    ->toBe(true);
