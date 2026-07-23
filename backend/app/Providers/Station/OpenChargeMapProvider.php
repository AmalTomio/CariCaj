<?php

namespace App\Providers\Station;

use App\Providers\Station\Contracts\StationProviderInterface;
use Illuminate\Support\Facades\Http;

class OpenChargeMapProvider implements StationProviderInterface
{
    public function fetch(): array
    {
        $response = Http::acceptJson()
    ->timeout(60)
    ->withHeaders([
        'User-Agent' => 'CariCaj/1.0',
        'X-API-Key' => config('services.openchargemap.api_key'),
    ])
    ->get(config('services.openchargemap.base_url') . '/poi', [
        'output' => 'json',
'countrycode' => config('services.openchargemap.country'),
        'maxresults' => 50,
        'compact' => true,
        'verbose' => false,
    ]);

        $response->throw();

        $stations = [];

        foreach ($response->json() as $station) {

            $address = $station['AddressInfo'] ?? [];

            $stations[] = [

                // Keep the same structure expected by StationSyncService
                'id' => $station['ID'],

                'lat' => $address['Latitude'] ?? null,

                'lon' => $address['Longitude'] ?? null,

                'tags' => [

                    'name' => $address['Title']
                        ?? 'Unnamed Charging Station',

                    'operator' =>
                        $station['OperatorInfo']['Title']
                        ?? 'Unknown Operator',

                    'addr:street' =>
                        $address['AddressLine1']
                        ?? 'Unknown Address',

                    'addr:city' =>
                        $address['Town']
                        ?? 'Unknown',

                    'addr:state' =>
                        $address['StateOrProvince']
                        ?? 'Unknown',

                    'addr:postcode' =>
                        $address['Postcode']
                        ?? '00000',

                    'description' =>
                        $address['AccessComments']
                        ?? null,

                    'opening_hours' =>
                        null,
                ],
            ];
        }

        return $stations;
    }
}