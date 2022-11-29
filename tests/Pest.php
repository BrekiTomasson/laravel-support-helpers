<?php

declare(strict_types=1);

expect()->extend('toBeOne', fn () => $this->toBe(1));
