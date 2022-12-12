<?php

declare(strict_types=1);

it('correctly adds integers to integers')
    ->expect(fn () => num(10)->add(5)->toNumber())
    ->toBeInt()
    ->toBe(15);

it('correctly adds floats to integers')
    ->expect(fn () => num(10)->add(5.5)->toNumber())
    ->toBeFloat()
    ->toBe(15.5);

it('correctly adds integers to floats')
    ->expect(fn () => num(10.5)->add(5)->toNumber())
    ->toBeFloat()
    ->toBe(15.5);

it('correctly adds floats to floats resulting in floats')
    ->expect(fn () => num(10.1)->add(5.1)->toNumber())
    ->toBeFloat()
    ->toBe(15.2);

it('correctly adds floats to floats resulting in integers')
    ->expect(fn () => num(10.5)->add(5.5)->toNumber())
    ->toBeInt()
    ->toBe(16);
