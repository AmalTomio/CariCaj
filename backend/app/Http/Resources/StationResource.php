<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id,

            'name' => $this->name,

            'address' => $this->address,

            'city' => $this->city,

            'state' => $this->state,

            'postcode' => $this->postcode,

            'latitude' => $this->latitude,

            'longitude' => $this->longitude,

            'description' => $this->description,

            'status' => $this->status,

            'is_public' => $this->is_public,

            'operator' => [
            'id' => $this->operator?->id,
            'name' => $this->operator?->name,
            'logo' => $this->operator?->logo,
        ],

        'available_connectors' => $this->connectors
            ->sum('available_ports'),

        'total_connectors' => $this->connectors
            ->sum('total_ports'),

        'connector_types' => $this->connectors
            ->pluck('connectorType.name')
            ->unique()
            ->values(),

        'amenities' => $this->amenities
            ->pluck('name')
            ->values(),

'distance' => isset($this->distance)
    ? round($this->distance, 1)
    : null,

    
        ];
    }
}