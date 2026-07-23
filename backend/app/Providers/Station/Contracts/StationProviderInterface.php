<?php

namespace App\Providers\Station\Contracts;

use App\Data\Station\StationData;

interface StationProviderInterface
{
    /**
     * @return StationData[]
     */
    public function fetch(): array;
}