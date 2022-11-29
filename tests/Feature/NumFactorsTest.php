<?php

declare(strict_types=1);

use BrekiTomasson\Support\Num;

it('returns factors of whole numbers')
    ->expect(fn () => Num::factors(10))
    ->toBeArray()
    ->toBe([2, 5]);

it('returns an empty array if no factors are found')
    ->expect(fn () => Num::factors(11))
    ->toBeArray()
    ->toBe([]);
