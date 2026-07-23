<?php

declare(strict_types=1);

namespace App\Integrations\OpenChargeMap;

use App\Data\Station\AddressData;
use App\Data\Station\CoordinatesData;
use App\Data\Station\OperatorData;
use App\Data\Station\StationData;

final class OpenChargeMapTransformer
{
    /**
     * @return StationData[]
     */
    public function transform(array $payload): array
    {
        $stations = [];

        foreach ($payload as $station) {

            if (data_get($station, 'AddressInfo.Country.ISOCode') !== 'MY') {
                continue;
            }

            $address = $station['AddressInfo'] ?? [];

            if (
                empty($address['Latitude']) ||
                empty($address['Longitude'])
            ) {
                continue;
            }

            $stations[] = new StationData(
                externalId: $station['ID'],

                name: $address['Title']
                    ?? 'Unnamed Charging Station',

                operator: new OperatorData(
                    $station['OperatorInfo']['Title']
                    ?? 'Unknown Operator'
                ),

                address: new AddressData(
                    street: $address['AddressLine1']
                        ?? 'Unknown Address',

                    city: $address['Town']
                        ?? 'Unknown',

                    state: $address['StateOrProvince']
                        ?? 'Unknown',

                    postcode: $address['Postcode']
                        ?? '00000',
                ),

                coordinates: new CoordinatesData(
                    latitude: (float) $address['Latitude'],
                    longitude: (float) $address['Longitude'],
                ),

                description: $address['AccessComments']
                    ?? null,

                openingHours: null,
            );
        }

        return $stations;
    }
}