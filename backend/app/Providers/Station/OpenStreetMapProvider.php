<?php

namespace App\Providers\Station;

use Illuminate\Support\Facades\Http;
use App\Providers\Station\Contracts\StationProviderInterface;

class OpenStreetMapProvider implements StationProviderInterface
{
    protected string $endpoint =
        'https://overpass-api.de/api/interpreter';

    public function fetch(): array
    {
        $query = <<<OVERPASS
[out:json][timeout:180];

area["ISO3166-1"="MY"][admin_level=2]->.malaysia;

(
  node["amenity"="charging_station"](area.malaysia);
  way["amenity"="charging_station"](area.malaysia);
  relation["amenity"="charging_station"](area.malaysia);
);

out center tags;
OVERPASS;

        $response = Http::timeout(180)
            ->acceptJson()
            ->withHeaders([
                'User-Agent' => 'CariCaj/1.0',
            ])
            ->asForm()
            ->post($this->endpoint, [
                'data' => $query,
            ]);

        if (!$response->successful()) {
            throw new \RuntimeException(
                "Overpass API Error ({$response->status()}):\n\n" .
                $response->body()
            );
        }

        return $response->json('elements', []);
    }
}