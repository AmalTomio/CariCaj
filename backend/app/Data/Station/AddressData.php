<?php

declare(strict_types=1);

namespace App\Data\Station;

final class AddressData
{
    public function __construct(
        public readonly string $street,
        public readonly string $city,
        public readonly string $state,
        public readonly string $postcode,
        public readonly string $country = 'Malaysia',
    ) {
    }
}