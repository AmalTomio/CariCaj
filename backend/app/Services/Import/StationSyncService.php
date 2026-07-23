<?php

namespace App\Services\Import;


use App\Providers\Station\Contracts\StationProviderInterface;
use App\Services\Import\Synchronizers\OperatorSynchronizer;
use App\Services\Import\Synchronizers\StationSynchronizer;

class StationSyncService
{
    public function __construct(
        protected StationProviderInterface $provider,
        protected OperatorSynchronizer $operatorSynchronizer,
        protected StationSynchronizer $stationSynchronizer,
    ) {}

    public function sync(): array
    {
        $stations = $this->provider->fetch();

        $created = 0;
        $updated = 0;

        foreach ($stations as $stationData) {

            $operator = $this->operatorSynchronizer->sync(
                $stationData->operator
            );

            $station = $this->stationSynchronizer->sync(
                $stationData,
                $operator
            );

            if ($station->wasRecentlyCreated) {
                $created++;
            } else {
                $updated++;
            }
        }

        return [
            'created' => $created,
            'updated' => $updated,
        ];
    }
}