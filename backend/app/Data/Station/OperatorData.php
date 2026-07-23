<?php

declare(strict_types=1);

namespace App\Data\Station;

use Illuminate\Support\Str;

final class OperatorData
{
    public function __construct(
        public readonly string $name,
    ) {
    }

    public function name(): string
    {
        return $this->name;
    }

    public function slug(): string
    {
        return Str::slug($this->name);
    }
}