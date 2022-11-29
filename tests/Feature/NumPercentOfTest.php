<?php

declare(strict_types=1);

use BrekiTomasson\Support\Num;

it('correctly finds percentages of integers into integers')
    ->expect(fn () => Num::percentOf(5, 20))
    ->toBeInt()
    ->toBe(25);

it('correctly finds percentages of floats into integers')
    ->expect(fn () => Num::percentOf(5.5, 55))
    ->toBeInt()
    ->toBe(10);

it('correctly finds percentages of floats into floats')
    ->expect(fn () => Num::percentOf(10.1, 20.2))
    ->toBeInt()
    ->toBe(50);

it('correctly finds fractional percentages')
    ->expect(fn () => Num::percentOf(15, 16))
    ->toBeFloat()
    ->toEqual(93.75);
