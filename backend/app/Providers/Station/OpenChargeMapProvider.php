<?php

declare(strict_types=1);

namespace App\Providers\Station;

use App\Integrations\OpenChargeMap\OpenChargeMapClient;
use App\Integrations\OpenChargeMap\OpenChargeMapTransformer;
use App\Providers\Station\Contracts\StationProviderInterface;

class OpenChargeMapProvider implements StationProviderInterface
{
    public function __construct(
        protected OpenChargeMapClient $client,
        protected OpenChargeMapTransformer $transformer,
    ) {
    }

    public function fetch(): array
    {
        return $this->transformer->transform(
            $this->client->fetchStations()
        );
    }
}