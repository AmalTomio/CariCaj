<?php

declare(strict_types=1);

namespace App\Integrations\OpenChargeMap;

use Illuminate\Support\Facades\Http;

final class OpenChargeMapClient
{
    public function fetchStations(): array
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
                'maxresults' => 1000,
                'compact' => true,
                'verbose' => false,
            ]);

        $response->throw();

        return $response->json();
    }
}