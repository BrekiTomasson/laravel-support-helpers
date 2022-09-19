<?php

declare(strict_types = 1);

namespace BrekiTomasson\Support;

use Illuminate\Support\Collection;
use RuntimeException;

class Number
{
    public int|float $value;

    public function __construct(float|int|string $number)
    {
        $this->value = Num::clean($number);
    }

    public function decimal(): self
    {
        $this->value = Num::decimal($this->value);

        return $this;
    }

    /** @return Collection<int, int> */
    public function factors(): Collection
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

    public function lessThan(int|float $value): bool
    {
        return $this->value < $value;
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

    public function toNumber(): float|int
    {
        return Num::clean($this->value);
    }

    public function withinRange(int|float $comparison, int $range, bool $inclusive = true): bool
    {
        return Num::withinRange($this->value, $comparison, $range, $inclusive);
    }
}
