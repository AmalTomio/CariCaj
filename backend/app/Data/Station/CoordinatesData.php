<?php

declare(strict_types=1);

namespace App\Data\Station;

final class CoordinatesData
{
    public function __construct(
        public readonly float $latitude,
        public readonly float $longitude,
    ) {
    }

    public function latitude(): float
    {
        return $this->latitude;
    }

    public function longitude(): float
    {
        return $this->longitude;
    }
}