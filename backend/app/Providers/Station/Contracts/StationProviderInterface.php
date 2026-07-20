<?php

namespace App\Providers\Station\Contracts;

interface StationProviderInterface
{
    /**
     * Fetch stations from external provider.
     *
     * @return array
     */
    public function fetch(): array;
}