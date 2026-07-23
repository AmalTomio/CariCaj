<?php

declare(strict_types=1);

namespace App\Data\Station;

final class StationData
{
    public function __construct(
        public readonly int $externalId,
        public readonly string $name,
        public readonly OperatorData $operator,
        public readonly AddressData $address,
        public readonly CoordinatesData $coordinates,
        public readonly ?string $description,
        public readonly ?string $openingHours,
        public readonly string $source = 'openchargemap',
    ) {
    }

    public function latitude(): float
    {
        return $this->coordinates->latitude();
    }

    public function longitude(): float
    {
        return $this->coordinates->longitude();
    }

    public function operatorName(): string
    {
        return $this->operator->name();
    }

    public function street(): string
    {
        return $this->address->street;
    }

    public function city(): string
    {
        return $this->address->city;
    }

    public function state(): string
    {
        return $this->address->state;
    }

    public function postcode(): string
    {
        return $this->address->postcode;
    }

    public function fullAddress(): string
    {
        return implode(', ', array_filter([
            $this->street(),
            $this->city(),
            $this->state(),
            $this->postcode(),
        ]));
    }

    public function coordinates(): array
    {
        return [
            'latitude' => $this->latitude(),
            'longitude' => $this->longitude(),
        ];
    }
}