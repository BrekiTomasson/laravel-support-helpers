<?php

declare(strict_types=1);

use BrekiTomasson\Support\Number;

function num(int|float|string $input): Number
{
    return new Number($input);
}
