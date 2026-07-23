<?php

declare(strict_types=1);

namespace App\Services\Import\Synchronizers;

use App\Data\Station\StationData;
use App\Models\Operator;
use App\Models\Station;

final class StationSynchronizer
{
    public function sync(
        StationData $stationData,
        Operator $operator
    ): Station {

        return Station::updateOrCreate(
            [
                'external_id' => $stationData->externalId,
            ],
            [
                'operator_id' => $operator->id,

                'name' => $stationData->name,

                'address' => $stationData->address->street,
                'city' => $stationData->address->city,
                'state' => $stationData->address->state,
                'postcode' => $stationData->address->postcode,

                'latitude' => $stationData->coordinates->latitude,
                'longitude' => $stationData->coordinates->longitude,

                'opening_hours' => $stationData->openingHours
                    ? [
                        'raw' => $stationData->openingHours,
                    ]
                    : null,

                'description' => $stationData->description,

                'is_public' => true,

                'status' => 'active',

                'source' => 'openchargemap',

                'verified' => false,

                'last_synced_at' => now(),
            ]
        );
    }
}