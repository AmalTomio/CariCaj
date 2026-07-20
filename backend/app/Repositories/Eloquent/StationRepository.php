<?php

namespace App\Repositories\Eloquent;

use App\Models\Station;
use App\Repositories\Contracts\StationRepositoryInterface;

class StationRepository implements StationRepositoryInterface
{
    public function all()
    {
        return Station::query()
            ->with([
                'operator',
                'connectors.connectorType',
                'amenities',
            ])
            ->get();
    }

    public function find(int $id)
    {
        return Station::with([
            'operator',
            'connectors.connectorType',
            'amenities',
        ])->findOrFail($id);
    }

    public function nearby(
    float $latitude,
    float $longitude,
    float $radius
) {
    return Station::query()
        ->with([
            'operator',
            'connectors.connectorType',
            'amenities',
        ])
        ->select('*')
        ->selectRaw("
            (
                6371 *
                acos(
                    cos(radians(?))
                    *
                    cos(radians(latitude))
                    *
                    cos(radians(longitude) - radians(?))
                    +
                    sin(radians(?))
                    *
                    sin(radians(latitude))
                )
            ) AS distance
        ", [
            $latitude,
            $longitude,
            $latitude,
        ])
        ->having('distance', '<=', $radius)
        ->orderBy('distance')
        ->get();
}

    public function search(array $filters)
    {
    }
}