<?php

namespace App\Services\Import;

use App\Models\Operator;
use App\Models\Station;
use App\Providers\Station\Contracts\StationProviderInterface;
use Illuminate\Support\Str;

class StationSyncService
{
    public function __construct(
        protected StationProviderInterface $provider
    ) {
    }

    public function sync(): array
    {
        $elements = $this->provider->fetch();

        $created = 0;
        $updated = 0;

        foreach ($elements as $element) {

            $tags = $element['tags'] ?? [];

            $latitude = $element['lat']
                ?? data_get($element, 'center.lat');

            $longitude = $element['lon']
                ?? data_get($element, 'center.lon');

            if (!$latitude || !$longitude) {
                continue;
            }

            $operatorName = trim($tags['operator'] ?? 'Unknown Operator');

            $operator = Operator::firstOrCreate(
                [
                    'slug' => Str::slug($operatorName),
                ],
                [
                    'name' => $operatorName,
                    'is_active' => true,
                ]
            );

            $stationData = [
                'operator_id' => $operator->id,

                'name' => $tags['name']
                    ?? 'Unnamed Charging Station',

                // Prevent NOT NULL database errors
                'address' => $tags['addr:street']
                    ?? $tags['addr:full']
                    ?? 'Unknown Address',

                'city' => $tags['addr:city']
                    ?? $tags['addr:district']
                    ?? 'Unknown',

                'state' => $tags['addr:state']
                    ?? 'Unknown',

                'postcode' => $tags['addr:postcode']
                    ?? '00000',

                'latitude' => $latitude,

                'longitude' => $longitude,

                'opening_hours' => isset($tags['opening_hours'])
                    ? [
                        'raw' => $tags['opening_hours']
                    ]
                    : null,

                'description' => $tags['description']
                    ?? null,

                'is_public' => true,

                'status' => 'active',

                'source' => 'openchargemap',

                'verified' => false,

                'last_synced_at' => now(),
            ];

            $station = Station::updateOrCreate(
                [
                    'external_id' => $element['id'],
                ],
                $stationData
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