<?php

declare(strict_types=1);

namespace BrekiTomasson\Support;

use RuntimeException;

class Number
{
    public int|float $value;

    public function __construct(float|int|string $number)
    {
        $this->value = Num::clean($number);
    }

    public function add(float|int|string $number): self
    {
        $this->value += Num::clean($number);

        return $this;
    }

    public function decimal(): self
    {
        $this->value = Num::decimal($this->value);

        return $this;
    }

    /** @return array<int, int> */
    public function factors(): array
    {
        if (! is_int($this->value)) {
            throw new RuntimeException('Factorization can only be done on integers.');
        }

        return Num::factors($this->value);
    }

    public function greaterThan(int|float $value): bool
    {
        return $this->value > $value;
    }

    public function inRange(int|float $lower_bound, int|float $upper_bound, bool $inclusive = true): bool
    {
        return Num::inRange($this->value, $lower_bound, $upper_bound, $inclusive);
    }

    public function integer(): self
    {
        $this->value = Num::integer($this->value);

        return $this;
    }

    public function lessThan(int|float $value): bool
    {
        return $this->value < $value;
    }

    public function over(float|int|string $number): self
    {
        $this->value /= Num::clean($number);

        return $this;
    }

    public function percentOf(int|float $total): self
    {
        $this->value = Num::percentOf($this->value, $total);

        return $this;
    }

    public function roundToPart(int $parts): self
    {
        $this->value = Num::roundToPart($this->value, $parts);

        return $this;
    }

    public function sub(float|int|string $number): self
    {
        $this->value -= Num::clean($number);

        return $this;
    }

    public function times(float|int|string $number): self
    {
        $this->value *= Num::clean($number);

        return $this;
    }

    public function toNumber(): float|int
    {
        /* Using Num::clean to ensure float 12.0 is returned as int 12 */
        return Num::clean($this->value);
    }

    public function withinRange(int|float $comparison, int $range, bool $inclusive = true): bool
    {
        return Num::withinRange($this->value, $comparison, $range, $inclusive);
    }
}
